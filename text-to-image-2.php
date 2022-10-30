<!DOCTYPE html>
<html lang="en">

<head>
    <title>Text-To-Image Generator</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="Type what you want your image to look like and our AI will create it for you." name="description" />
    <meta content="text to image, image generator" name="keywords" />
    
    <script src="/assets/js/jquery-3.6.1.min.js"></script>

    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
    <!-- <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script> -->

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/main.css">

    
    <script data-ad-client="ca-pub-8348187590713387" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-161314-54"></script>
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-161314-54');
    </script>


<script src="https://cdnjs.deepai.org/deepai.min.js"></script>

<script>
   function myFunction() {
       alert("Lovely");
       var resp;
       deepai.setApiKey('2350dbe7-ecfd-47ed-9ffa-b29ecc988b2e');
       (async function() {
           resp = await deepai.callStandardApi("stable-diffusion", {
               text: "Love";
           });
       console.log(resp);
           $('#test').html('<img src="'+resp['output_url']+'" width="512">');
       })()

   }
</script>


</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <a href="https://boredhumans.com">
                    <img class="img-responsive" id="myimg" src="https://boredhumans.b-cdn.net/images/logo.jpg" height="90" width="354">
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col text-center">
                <p class="h3"><strong>Text-To-Image Generator</strong></p>
                <p class="mt-3">Type what you want to see and our AI will create an image for you:</p>
                <p><input id="question" type="text" size="30" name="question" class="search-query  question_input_field mt-3" placeholder="Enter Your Phrase Here"></p>
                
                <!-- <button type="submit" name="submit" id="generate-text" class="button is-link mt-3"> -->
                <!-- <button type="submit" name="submit" i="generate-text" class="btn btn-primary mt-3"> -->
                <button onclick="myFunction()" class="btn btn-primary mt-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg>&nbsp;&nbsp; Generate An Image!
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div id="model-output" class="column text-center">
                    <div id="tutorial" class="subtitle">
                        <em>Your Image Will Appear Here In A Few Seconds!</em>
                        <div id="test"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col text-center">
                <p>Note: Our text-to-image generator is based on the open-source <a href="https://stability.ai/blog/stable-diffusion-public-release" target="new">Stable Diffusion</a> code from OpenAI. By using our version of their program, you must agree to their license terms at <a href="https://huggingface.co/spaces/CompVis/stable-diffusion-license" target="new">Stable Diffusion</a>. Both non-commercial and commercial usage is allowed but you can't use it to deliberately produce nor share illegal or harmful outputs or content. We claim no rights on the output you generate. You are free to use the images and are accountable for their use which must not go against the provisions set in the license.</p>
                
                 <div class="col text-center">Keep in mind one of the benefits of a text-to-image generator is that you can use it to create images that are artistically creative, such as "a puppy flying a spaceship". You can also stylize the image so instead of just typing "Elon Musk" you might for example use one of these phrases:<BR>
A painting of Elon Musk<BR>
oil painting of Elon Musk<BR>
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
                    $('#generate-text').trigger('click');
                }
            });
            $("#generate-text").click(function() {
                var dataString = {};
                var qes = $('.question_input_field').val();

                if ($('#question').val()) {
                    $.ajax({
                        url: "api_text-to-image.php",
                        type: 'POST',
                        cache: false,
                        data: {
                            question: qes, // send along this data (can add more data separated by comma)
                        },
                        beforeSend: function(data) {
                            $('#generate-text').addClass("is-loading");
                            $('#generate-text').prop("disabled", true);
                        },
                        timeout: 100000,
                        success: function(response) {
                            $('#generate-text').removeClass("is-loading");
                            $('#generate-text').prop("disabled", false);
                            $('#tutorial').remove();
                            $('#model-output').html("");
                            var html = '<div class=\"gen-box\">' + response + '</div><div class="gen-border"></div>';
                            $(html).appendTo('#model-output').hide().fadeIn("slow");

                        }
                    });

                } else {

                    $('#generate-text').removeClass("is-loading");
                    $('#generate-text').prop("disabled", false);
                    $('#tutorial').remove();
                    $('#model-output').html("");
                    var html = '<div class="gen-box warning">Please fill in the form with your word/phrase! Please try again!</div><div class="gen-border"></div>';
                    $(html).appendTo('#model-output').hide().fadeIn("slow");
                }

            });
        });
    </script>
    
       
    
     <?php include 'footer_menu.php'; ?>
    
    
</body>
</html>