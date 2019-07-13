<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Tesla Model 3 Preview</title>
    <style>
    body, html, #app {
        height: 100%;
        width: 100%;
    }
    h1 {
        font-size: 1.3em;
    }
    .popout {
        position: absolute;
        top: 20px;
        left: 20px;
        width: 200px;
    }
    select {
        width: 100px;
    }
    #img-cntr
    {
        width:  100%; /*or 70%, or what you want*/
        height: 100%; /*or 70%, or what you want*/
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
    .carImg {
        width: 100%;
    }
    @media (min-width: 320px) and (max-width: 480px) {
        .carImg {
            position: absolute;
            bottom: 0px;
            width: 100%;
        }
        html, body, #app {
            height: 100vh;
        }
        
    }
  
</style>

<meta property="og:url"                content="http://tesla.lanham.io/" />
<meta property="og:type"               content="website" />
<meta property="og:title"              content="Tesla Model 3 Preview" />
<meta property="og:description"        content="Allows you to easy see different color and wheel combinations for Tesla Model 3, and also download the image to use as a wallpaper" />
<meta property="og:image"              content="http://tesla.lanham.io/preview.png" />


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-143791629-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-143791629-1');
</script>

  </head>
  <body>

    <div id="app">

        <!-- <div id="imgcntr" :style="styleObject"></div> -->

        <img class="carImg" :src="imageUrl" />

        <div class="popout">
            <h1>Tesla Vehicle Preview</h1>
            <hr />
            <div class="slim">
                <div class="form-group">
                    <label for="exampleInputEmail1">Colour</label>
                    <select name="colour" v-model="color" class="form-control">
                        <option value="$PBSB">Black</option>
                        <option value="$PMNG">Silver</option>
                        <option value="$PPSB">Blue</option>
                        <option value="$PPSW">White</option>
                        <option value="$PPMR">Red</option>

                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Wheels</label>
                    <select name="wheels" v-model="wheels" class="form-control">
                        <option value="$W38B">18" Aero</option>
                        <option value="$W39B">19"</option>
                        <option value="$W32P">20"</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="exampleInputEmail1">Image Background</label>
                    <select name="background" v-model="background" class="form-control">
                        <option value="white">White</option>
                        <option value="black">Black</option>
                        <option value="grey">Grey</option>
                        <option value="lightgrey">Light Grey</option>
                        <option value="slate">Slate</option>
                    </select>
                </div>
            
                <div class="form-group">
                    <label for="exampleInputEmail1">Orientation</label>
                    <select name="facing" v-model="facing" class="form-control">
                        <option value="$DRLH">Left</option>
                        <option value="$DRRH">Right</option>
                    </select>
                </div>
                <p class="small">If you like this site and haven't ordered yet, then use my link and we'll both get 1,000 free supercharger miles</p>
                <a href="https://ts.la/matt78103" class="btn btn-primary" target="_blank">Visit Tesla Website</a>
            </div>
        </div>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script>
        let color, imageUrl = '';

        var app = new Vue({
            el: '#app',
            mounted: function() {
                this.$nextTick(function () {
                    this.changeImage();
                });
            },
            data: {
                styleObject: {
                    width: '100%',
                    height: '100%',
                    backgroundImage: this.imageUrl,
                    backgroundPosition: 'center',
                    backgroundRepeat: 'no-repeat'
                },
                color: '$PPSB',
                imageUrl: '',
                style: '$DV4W',
                wheels: '$W38B',
                background: 'white',
                facing: '$DRRH',
                
                changeImage: function() {
                    this.imageUrl = 'image.php?wheels=' + this.wheels + '&color=' + this.color + '&facing=' + this.facing + '&background=' + this.background;
                    this.styleObject.backgroundImage = "url(" + this.imageUrl + ")";
                    console.log(this.imageUrl);
                }
            },
            watch: {
                color: function (val) {
                    this.changeImage();
                },
                wheels: function (val) {
                    this.changeImage();
                },
                facing: function (val) {
                    this.changeImage();
                },
                background: function (val) {
                    this.changeImage();
                }
            }
        })
    </script>
  </body>
</html>
