<!doctype html>
<html lang="vi">
<head>
    <title><?= BRAND_NAME ?> | Liên lạc</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php require 'views/includes/public/base_css.php'; ?>

    <!-- Theme Style -->
    <link rel="stylesheet" href="<?= URL ?>assets/public/css/style.css">
</head>
<body>

<?php require 'views/includes/public/header.php' ?>
<!-- END head -->

<section class="site-hero overlay page-inside" style='background-image: url("<?= URL; ?>assets/public/img/hero_2.jpg")'>
    <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center">
            <div class="col-md-10 text-center">
                <h1 class="heading" data-aos="fade-up">Contact</h1>
                <p class="sub-heading mb-5" data-aos="fade-up" data-aos-delay="100">Get in touch with us.</p>
            </div>
        </div>
        <!-- <a href="#" class="scroll-down">Scroll Down</a> -->
    </div>
</section>
<!-- END section -->


<section class="section bg-primary contact-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <?php if($check == 0 ) { ?>
                <form action="" method="post" class="bg-white p-md-5 p-4 mb-5" style="margin-top: -150px;" id="contact-form">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" class="form-control " name="name">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" class="form-control " name="phone">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" class="form-control " name="email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="message">Write Message</label>
                            <textarea name="message" id="message" class="form-control " cols="30" rows="8"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="submit" name="submit" value="Send Message" class="btn btn-primary">
                        </div>
                    </div>
                </form>
                <?php } else { ?>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <div class="alert alert-success">
                                Bạn đã gởi liên hệ thành công
                            </div>
                            <a href="<?= URL ?>" class="btn btn-success" >Về trang chủ</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="col-md-10 ml-auto contact-info">
                        <p><span class="d-block">Address:</span>
                            <span> 98 West 21th Street, Suite 721 New York NY 10016</span></p>
                        <p><span class="d-block">Phone:</span> <span> (+1) 435 3533</span></p>
                        <p><span class="d-block">Email:</span> <span> info@yourdomain.com</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require 'views/includes/public/footer.php' ?>

<?php require 'views/includes/public/base_script.php' ?>

<script type="text/javascript">
    $(document).ready(function (){
        $("#contact-form").validate({
            errorPlacement: function(label, element) {
                label.addClass('alert alert-danger');
                label.insertAfter(element);
            },
            rules:{
                name:{
                    required: true,
                    rangelength: [6, 32],
                },
                phone:{
                    required: true,
                    number: true,
                    rangelength: [9, 13],
                },
                email:{
                    required: true,
                    email: true,
                },
                message:{
                    required: true,
                    minlenght: 6,
                },
            },
            messages:{
                name:{
                    required: "Hãy nhập Họ và tên",
                    rangelength: "Họ và tên có độ dài từ 6-32 kí tự",
                },
                phone:{
                    required: "Hãy nhập Số điện thoại",
                    number: "Số điện thoại chỉ chứa kí tự số",
                    rangelength: "Số điện thoại có độ dài từ 9-13 kí tự",
                },
                email:{
                    required: "Hãy nhập Email",
                    email: "Email sai định dạng",
                },
                message:{
                    required: "Hãy nhập lời nhắn",
                    minlenght: "Lời nhắn chứa ít nhất 6 kí tự",
                },
            },
            ignore: []
            
        });         
    });
</script>

</body>
</html>