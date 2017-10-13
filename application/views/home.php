

<div class="container text-editor-container">
    <div class="row">
        <div class="col-lg-10 col-xs-10">
            <h1>My NotePad</h1> <p>Designed by Vinod Selvin</p>
        </div>     
        <div class="col-lg-2 col-xs-2 glyphicon glyphicon-floppy-disk btn-lg margin-top-20" ng-click="save();">

        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-lg-12 col-xs-12">
            <div contenteditable="true" class="text-editor" ng-model="mytext" ng-init="mytext = ''" id="mytext">
                <?php echo $message;?>
            </div>
        </div>
    </div>
    
</div>

