var app = angular.module('myApp', []);
app.controller('myNotePadController', function($scope, $window, $http) {
    
    $scope.ctrlDown = false;
    $scope.ctrlKey = 17, $scope.vKey = 86, $scope.cKey = 67;
   
    
   $scope.keyDownFunc = function($event) {
    if ($scope.ctrlDown && String.fromCharCode($event.which).toLowerCase() == 's') 
    {
        $event.preventDefault();

        $scope.ctrlDown = false;
        
        $scope.save();
    }
};

    $scope.save = function(){
        
        $http({
            method: 'POST',
            url: "home/save",
            data: $.param({'content': $('#mytext').html().trim()}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        })
           
        .success(function(data,status,headers,config){
            Materialize.toast("Saved", 2000);
        });
    }

    angular.element($window).bind("keyup", function($event) {
                if ($event.keyCode == $scope.ctrlKey)
                        $scope.ctrlDown = false;
                        $scope.$apply();
        });

    angular.element($window).bind("keydown", function($event) {
            if ($event.keyCode == $scope.ctrlKey)
                    $scope.ctrlDown = true;
                    $scope.$apply();
    });

});

