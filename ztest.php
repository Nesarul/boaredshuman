<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/js/fileinput.min.js"></script> -->
    <script src="fileinput.js"></script>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/css/fileinput.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-12 col-md-4 offset-md-4 offset-sm-3">
                <div class="file-loading">
                    <input id="fileCust" name="fileCust" type="file">
                </div>
            </div>
        </div>
    </div>

<script>
$(document).ready(function() {
    $('#fileCust').fileinput({
        theme: 'fa',
        uploadUrl: "upload.php",
        allowFileExtensions: ['jpg','jpeg','png','gif'],
        overwriteInitial: false,
        maxFileSize:2048,
        maxFilesNum:1,
        validateInitialCount: true,
      
    }).on('filebeforedelete', function() {
        var aborted = !window.confirm('Are you sure you want to delete this file?');
        if (aborted) {
            window.alert('File deletion was aborted! ' + krajeeGetCount('fileCust'));
        };
        return aborted;
    }).on('filedeleted', function() {
        setTimeout(function() {
            window.alert('File deletion was successful! ' + krajeeGetCount('fileCust'));
        }, 900);
    });
});
</script>
</body>
</html>