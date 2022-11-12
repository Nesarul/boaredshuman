<!DOCTYPE html>
<html lang="en">

<head>
    <title>Text-To-Image Generator</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="Type what you want your image to look like and our AI will create it for you." name="description" />
    <meta content="text to image, image generator" name="keywords" />
    <script src="/boaredshuman/assets/js/jquery-3.6.1.min.js"></script>
    <link rel="stylesheet" href="/boaredshuman/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/boaredshuman/assets/css/main.css">
    <script src="deepai.min.js"></script>
<script data-ad-client="ca-pub-8348187590713387" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-161314-54"></script>
</head>
<body>
    <div class="container">
        			<?php include 'header.php';?>
        <div class="row">
            <div class="col text-center">
                <p class="h3"><strong>Text-To-Image Generator</strong></p>
                <p class="mt-3">Type what you want to see and our AI will create 4 different images for you:</p>
                <div class="col-12 col-md-6 offset-md-3">
                    <div class="row">
                        <div class="col-12 col-sm-8 mb-3">
                            <label for="imageFile" class="form-label text-left">Upload Audio File (FLAC, WAV, or MP3 files Only)</label>
                            <input class="form-control form-control-sm" id="imageFile" type="file">
                        </div>
                        <div class="col-12 col-sm-4 mb-3 d-flex align-items-end">
                            <button type="button" class="btn btn-sm btn-primary" id="fileUpload">Upload</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<BR>
        <div class="row">
            <div class="col">
                <div id="model-output" class="column text-center">
                    <div id="tutorial" class="subtitle">
                        <em>Your 4 Images Will Appear Here In Around 20-30 Seconds!</em>
                        <div id="model-output"></div>
                    </div>
                </div>
            </div>
        </div>
<BR>
        <div class="row">
            <div class="col text-center">
                <p>Note: To save an image to share on social media, right click on it, click "Save Image As...", and save it to your pc or mobile device. Our text-to-image generator is based on the open-source <a href="https://stability.ai/blog/stable-diffusion-public-release" target="new">Stable Diffusion</a> code from Stability AI and uses an API from <a href="https://deepai.org/machine-learning-model/stable-diffusion" target="new">DeepAI</a>. 
                
                 By using our version of their program, you must agree to their license terms at <a href="https://huggingface.co/spaces/CompVis/stable-diffusion-license" target="new">Stable Diffusion</a>. Both non-commercial and commercial usage is allowed but you can't use it to deliberately produce nor share illegal or harmful outputs or content. We claim no rights on the output you generate. You are free to use the images and are accountable for their use which must not go against the provisions set in the license.</p>
                
                 <div class="col text-center">Keep in mind one of the benefits of a text-to-image generator is that you can use it to create images that are artistically creative, such as "a puppy flying a spaceship". You can also stylize the image so instead of just typing "Elon Musk" you might for example use one of these phrases:<BR>
A painting of Elon Musk<BR>
Oil painting of Elon Musk<BR>
Cartoon version of Elon Musk<BR>
Anime version of Elon Musk<BR>
Painting of Elon Musk fantasy style<BR>
Painting of Elon Musk futuristic style<BR>
Painting of Elon Musk psychedelic style<BR>
Painting of Elon Musk mosaic style<BR>
Painting of Elon Musk funky style<BR>
Painting of Elon Musk Rembrandt style<BR>
Painting of Elon Musk Kandinsky style<BR>
Painting of Elon Musk Cubist style<BR>
Painting of Elon Musk trippy style<BR>
Painting of Elon Musk pop art style<BR>
Painting of Elon Musk Native American style<BR>
Painting of Elon Musk Impressionist style<BR>
Painting of Elon Musk Degas style<BR>
Painting of Elon Musk Cezanne style<BR>
Painting of Elon Musk Matisse style<BR>
Painting of Elon Musk French style
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('keyup', function(e) {
                if (e.keyCode == 13) {
                    $('#fileUpload').trigger('click');
                }
            });
       
            $("#fileUpload").click(function() {
                var file_data = $('#imageFile').prop('files')[0];   
                var form_data = new FormData();                  
                form_data.append('file', file_data);
                $.ajax({
                    url: 'image-upload.php', // <-- point to server-side PHP script 
                    type: 'POST',
                    dataType: 'text',  // <-- what to expect back from the PHP script, if anything
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,                         
                    success: function(resp){
                        alert(resp); // <-- display response from the PHP script, if any
                    },
                    error: function(data){
                        alert("Something seriously wrong happen.");
                    }
                });
            });
        });
    </script>
    <BR>
<?php include 'footer_menu.php'; ?>
</body>
</html>