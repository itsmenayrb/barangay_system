<?php
    include 'header.php';
?>
<body>
    <div class="carousel slide carousel-fade" id="myCarousel" data-ride="carousel"> <!-- CAROUSEL -->
        <ol class="carousel-indicators">
            <li data-target="myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="myCarousel" data-slide-to="1"></li>
            <li data-target="myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox"> <!-- CAROUSEL INNER -->
            <div class="carousel-item active">
                <img src="img/hotlines.jpg" class="img-fluid" alt="hotlines">
                <div class="carousel-caption d-none d-md-block" id="carouselCaption1">
                    <h2 class="text-justify"><strong>Be equipped!</strong><br><br>Save these numbers to your mobile phone.</h2>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/medical.jpg" class="img-fluid" alt="medical">
                <div class="carousel-caption d-none d-md-block" id="carouselCaption2">
                    <h2 class="text-justify"><strong>Medical<br>on the Go!</strong></h2><br><br>
                    <a class="btn btn-primary btn-lg pull-left" role="button" href="index.php#medical">Learn more.</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/assembly.jpg" class="img-fluid" alt="assembly">
                <div class="carousel-caption d-none d-md-block" id="carouselCaption3">
                    <h2><strong>Yey!<br>It's General Assembly</strong></h2><br>
                    <a class="btn btn-primary btn-lg pull-left" role="button" href="index.php#assembly">Learn more.</a>
                </div>
            </div>
        </div> <!-- END OF CAROUSEL INNER -->
        <!-- CONTROLS -->
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div> <!-- END OF CAROUSEL -->
    <!-- CARDS -->
    <div class="jumbotron jumbotron-fluid" id="newsWrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card-deck">
                        <div class="card">
                            <img class="card-img-top" src="img/hotlines.jpg" alt="Hotline Numbers">
                            <div class="card-body">
                                <h5 class="card-title">Hotline Numbers</h5>
                                <p class="card-text">Be sure that always ready. Save these numbers to your mobile phone.</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Last updated 3 mins ago</small>
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top" src="img/medical.jpg" alt="Medical">
                            <div class="card-body">
                                <h5 class="card-title">Medical</h5>
                                <p class="card-text">Murang Medikal handog ng barangay.</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Last updated 1 day ago</small>
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top" src="img/assembly.jpg" alt="Barangay Assembly">
                            <div class="card-body">
                                <h5 class="card-title">Barangay Assembly</h5>
                                <p class="card-text lead">Makialam! Makilahok! at Makiisa!</p>
                                <p class="card-text">Nagkakaisang Komunidad tungo sa Mapayapa, Maunlad at Matiwasay na Barangay</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Last updated 3 days ago</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-md-auto">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card" style="width:18rem;">
                                <img class="card-img-top" src="..." alt="Construction">
                                <div class="card-body">
                                    <p class="card-text">Lorem ipsum Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Integer posuere erat a ante.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-auto">
                            <div class="card" style="width:18rem;">
                                <img class="card-img-top" src="..." alt="Construction">
                                <div class="card-body">
                                    <p class="card-text">Lorem ipsum Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Integer posuere erat a ante.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- END OF CARDS -->
    <!-- MISSION AND VISION -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <div class="carousel">
                <small class="text-muted text-center">
                    MISSION AND VISION
                </small>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="carousel-caption d-none d-md-block">MISSION</div>
                        <p style="font-family: 'Century Gothic';"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            $(".carousel").carousel({
                interval: 5000,
                pause: true,
                keyboard: true
            });
        });

        $(function(){
            $('#resetselector').change(function(){
                $('.thru').hide();
                $('#' + $(this).val()).show();
            });
        });

        var  email = $("#remail");

        $(document).ready(function () {
            $('#submit').on('click', function(){
                if(email.val() != ""){
                    email.css('border', '1px solid green');

                    $.ajax({
                        url:'forgotpassword.php',
                        method: 'POST',
                        dataType: 'text',
                        data: {
                            email: email.val()
                        }, success: function (response){
                            console.log(response);
                        }
                    })
                }
                else{
                    email.css('border', '1px solid red');
                }
            });
        });
    </script>
</body>
<?php
    include 'footer.php';
?>

