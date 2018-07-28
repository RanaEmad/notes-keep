<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Notes</title>
        <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap-4.1.1/dist/css/bootstrap.min.css">
        <script src="<?= base_url() ?>assets/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="<?= base_url() ?>assets/bootstrap-4.1.1/dist/css/bootstrap.min.css" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/main.css">
        <script>base_url = "<?= base_url() ?>"</script>
        <script type="text/javascript" src="<?= base_url() ?>assets/js/main.js"></script>
    </head>
    <body>
        <!--BEGIN NAVBAR-->
        <div class="container-fluid max-width">
            <nav class="navbar navbar-expand-lg navbar-light bg_red text-white">
                <a class="navbar-brand text-white" href="#">Notes</a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </nav>
        </div>
        <!--END NAVBAR-->
        <!--BEGIN NOTES-->
        <div class="container">
            <div class="row mb_10 mt_10">
                <div class="col-sm-8 center">
                    <input type="hidden" name="insert_note_id" id="insert_note_id" value="0">
                    <div class="card insert_note_card">
                        <div id="insert_note" class="card-body light_gray">
                            Take a note...
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <?php 
                    $i=0;
                    foreach ($notes as $note){ 
                        $i++;
                        if($i==1){
                            ?>
                    <div class="row mb_10 mt_10">
                    <?php 
                        }
                        ?>
                    <div class="col-sm-3">
                        <div class="card full-height">
                            <div class="card-body">
                                <h5 class="card-title"><?=$note->title?></h5>
                                <p class="card-text"><?=$note->text?></p>
                            </div>
                            
                        </div>
                    </div>
                        
                        <?php if($i==4){
                             $i=0;
                            ?>
                    </div>
                        <?php
                        }
                        ?>
                        
                    <?php } ?>
                </div>
            </div>
        </div>
        <!--END NOTES-->
    </body>
</html>