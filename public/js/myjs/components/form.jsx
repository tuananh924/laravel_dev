var gb_url = 'http://localhost:3000/getlist';
var courses_add_url = 'http://localhost:3000/add';

// Define header table
var Thead = React.createClass({
    render: function() {
        return (
            <thead>
                <tr>
                    <th className="text-center">ID course</th>
                    <th>Name course</th>
                    <th>Alias course</th>
                    <th>Created date</th>
                    <th className="text-center">Action</th>
                </tr>
             </thead>
        );
    }
});
// Define Row
var Trow = React.createClass({
    editCourse: function() {
        alert(this.props.id);
    },
    render: function() {
        return (
            <tr>
                <td className="text-center"> {this.props.id} </td>
                <td> {this.props.title_course} </td>
                <td> {this.props.alias_course} </td>
                <td> {this.props.created_at} </td>
                <td className="text-center">
                    <label className="label label-primary" idCourse={this.props.id} onClick={this.editCourse} title="Edit course">Edit</label>&nbsp;
                    <label className="label label-danger" title="Delete" idCourse={this.props.id} onClick={this.deleteCourse}>Delete</label>
                </td>
            </tr>
        );
    }
})
;// Define Tbody
var Tbody = React.createClass({
    render: function() {
        var rowsCourse = this.props.courses.map(function(course){
            return (
                <Trow id={course.id} title_course={course.title_course} alias_course={course.alias_course} created_at={course.created_at} key={course.id}/>
            );
        });
        return (
            <tbody>
                {rowsCourse}
            </tbody>
        );
    }
});

var FormCourse = React.createClass({
    getInitialState() {
        return {
              title_course: '',actionPage: 'Insert'
        };
    },
    handleCourseChange: function(e) {
        this.setState({title_course : e.target.value});
    },
    handleSubmitForm: function(e) {
        e.preventDefault();
        var title_course = this.state.title_course.trim();
        if(title_course=='') {
            return;
        }
        this.props.onSubmitManagerCourse({title_course: title_course});
        this.setState({title_course: ''});
    },
    render: function() {
        return (
            <form class="form-group" onSubmit={this.handleSubmitForm}>
                <div className="col-md-5">
                    <input type="text" value={this.state.title_course} onChange={this.handleCourseChange} className="form-control round-input" placeholder="Enter name sourse"/>
                </div>
                <div class="col-md-2">
                    <input type="submit" className="btn btn-primary" value={this.state.actionPage}/>
                </div>
            </form>
        );
    }
});
// Define Table
var ManagerCourse = React.createClass({
    getInitialState() {
        return {
            courses: []
        };
    },
    loadCourseOnServer: function() {
        $.ajax({
            url: this.props.url,
            dataType: 'json',
            cache: false,
            success: function(data){
              this.setState({courses: data.data});
            }.bind(this),
            error: function(){
              console.log(this.props.url, status, err.toString());
            }.bind(this)
        });
    },
    handleSubmitCourse: function(newcourse) {
        var coursesCurrent = this.state.courses;
        newcourse.id = 'Updating...';
        newcourse.alias_course = 'Updating...';
        newcourse.created_at = 'Updating...';
        var courses_just = coursesCurrent.concat([newcourse]);
        this.setState({courses: courses_just});
        $.ajax({
            url: this.props.add_url,
            dataType: 'json',
            type: 'GET',
            data: newcourse,
            success: function(data) {
            this.setState({courses: data.data});
            }.bind(this),
            error: function(xhr, status, err) {
            this.setState({courses: coursesCurrent});
            console.error(this.props.url, status, err.toString());
            }.bind(this)
        });
    },
    componentDidMount: function() {
        this.loadCourseOnServer();
    },
    render : function() {
        return (
            <div className="col-md-12">
                <section className="panel">
                    <div className="panel-heading">Create course</div>
                    <div className="panel-body">
                        <div className="row">
                            <div className="col-md-11 col-md-push-1">
                                <FormCourse onSubmitManagerCourse={this.handleSubmitCourse}/>
                            </div>
                        </div>
                        <hr/>
                        <div className="row">
                            <div className="col-md-12" id="courseTable">
                                <table className="table table-bordered table-hover">
                                    <Thead/>
                                    <Tbody courses={this.state.courses}/>
                                </table>
                            </div>
                        </div>
                    </div>

                </section>
            </div>
        );
    }
});

ReactDOM.render(<ManagerCourse url={gb_url} add_url={courses_add_url}/>, document.getElementById('content-page'));
