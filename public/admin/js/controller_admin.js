var app = angular.module("iscrazyworldApp", []);
app.controller('iscrazyworldAdminCtrl', function(){
    var vm = this;
    vm.submitForm = function(isValid) {
        // check to make sure the form is completely valid
        if (isValid) {
            alert('our form is amazing');
        }
    };
});