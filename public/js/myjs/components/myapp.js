var MYAPP = React.createClass({
    displayName : 'MYAPP',
    render: function() {
        return React.DOM.div(null, "Rendering faster in AngularJs with ", this.props.framework);
    }
});
