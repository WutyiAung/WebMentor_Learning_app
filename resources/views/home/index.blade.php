   <x-header/>
    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-4">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/home-bg.png" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h5 class=" text-uppercase mb-3 animated slideInDown" style="color: #fb873f;">Welcome to
                                   WebMentor</h5>
                                <h1 class="display-3 text-white animated slideInDown title">
                                    Web Development ခရီးစဉ်ကို
                                    WebMentor နှင့်စတင်လိုက်ပါ။
                                </h1>
                                <p class=" text-white mb-4 pb-2">
                                    Explore a curated collection of tutorials, tools, and tips. Enhance your skills with the best resources in web development, all in one place.
                                </p>
                                <a href="{{ route('about') }}"
                                    class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Read More</a>
                                     <a href="{{ route('login') }}" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Join
                                    Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->
    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-2 text-center">
                <div class="col-12 wow fadeInUp" data-wow-delay="0.3s">
                    <h1 style="color: #fb873f;" class="title">WebMentor နှင်အတူ သင့်ရဲ့ web developer အိပ်မက်တွေကို အကောင်ထည်ဖော်လိုက်ပါ။</h1>
                    <p class="mt-3 mb-5">Get unlimited access to a wide range of web development courses, projects, and resources on WebMentor, tailored for beginners and taught by experienced instructors. All content is freely available to help you start and advance your journey in web development.</p>

                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item text-center pt-3 shadow d-flex flex-column h-100" style="min-height: 400px;">
                        <div class="p-4 d-flex flex-column flex-grow-1 align-items-center justify-content-center">
                            <img src="img/icon1.png" alt="Learn Anything Icon" class="mb-4" style="height: 80px;">
                            <h5 class="mb-3 fw-bold">Learn Anything</h5>
                            <p class="mb-0"> web development ဆိုင်ရာသင်ခန်းစာများစွာ နှင့် free resources တွေကိုဝေမျှပေးလျက်ရှိပါတယ်။</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item text-center pt-3 shadow d-flex flex-column h-100" style="min-height: 400px;">
                        <div class="p-4 d-flex flex-column flex-grow-1 align-items-center justify-content-center">
                            <img src="img/icon2.png" alt="Save Money Icon" class="mb-4" style="height: 80px;">
                            <h5 class="mb-3 fw-bold">Save Money</h5>
                            <p class="mb-0">Videos သင်ခန်းစာများစွာကို ကုန်ကျစရိတ်မရှိပဲ အခမဲ့ လေ့လာနိုင်တဲ့အတွက် ကုန်ကျစရိတ်သက်သာနိုင်ပါတယ်။</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item text-center pt-3 shadow d-flex flex-column h-100" style="min-height: 400px;">
                        <div class="p-4 d-flex flex-column flex-grow-1 align-items-center justify-content-center">
                            <img src="img/icon3.png" alt="Flexible Learning Icon" class="mb-4" style="height: 80px;">
                            <h5 class="mb-3 fw-bold">Flexible Learning</h5>
                            <p class="mb-0">Web development courses အစုံအလင်ကို အချိန်မရွေး နေရာမရွေး အခမဲ့လေ့လာနိုင်ပါတယ်။</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item text-center pt-3 shadow d-flex flex-column h-100" style="min-height: 400px;">
                        <div class="p-4 d-flex flex-column flex-grow-1 align-items-center justify-content-center">
                            <img src="img/free.png" alt="Free Learning Icon" class="mb-4" style="height: 80px;">
                            <h5 class="mb-3 fw-bold">Free Learning</h5>
                            <p class="mb-0">videos သင်ခန်းစာမျိုးစုံကိုတစ်နေရာတည်းမှာကုန်ကျစရိတ်မရှိပဲအခမဲ့လေ့လာနိုင်ပါတယ်။</p>
                        </div>
                    </div>
                </div>
            </div>
            
            
            
        </div>
    </div>
    <!-- Service End -->

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="img/about.jpg" alt=""
                            style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start pe-3">About Us</h6>
                    <h1 class="mb-4" style="color: #fb873f;">Welcome to WebMentor</h1>
                    <p class="mb-4 " style=" text-align: justify; line-height:2.5rem">
                        WebMentor ဟာ web development carrer ကိုစတင်မယ့် 
                        ကျောင်းသား လူငယ်တွေအတွက် လမ်းမပျောက်စေရန် web development
                         ကိုအခမဲ့လေ့လာနိုင်တဲ့ free courses တွေ နှင့်အတူ ကျွမ်းကျင်တဲ့ မြန်မာဆရာတွေရေးသားထားသော articles တွေကို တစ်နေရာတည်းမှာလေ့လာနိုင်ရန် စုစည်းတင်ပြပေးထားပြီး 
                         beginners တွေအတွက် learning paths တွေပေးပြီး step by step လေ့ကျင့်ပေးသွားမယ့် learning website လေးတစ်ခုဖြစ်ပါတယ်။
                    </p>
                    <a class="btn text-light py-3 px-5 mt-2" href="{{ route('about') }}">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Categories Start -->
    <div class="container-xxl py-5 category">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center px-3">Categories</h6>
                <h1 class="mb-5" style="color: #fb873f;">Popular Topics to Explore</h1>
            </div>
            <div class="row g-2 m-2">
                @foreach($categories as $category)
                    <div class="col-lg-3 col-md-6 text-center">
                        <!-- Wrap the entire card in an anchor tag -->
                        <a href="{{ route('public.courses') }}?category_id={{ $category->id }}" class="text-decoration-none">
                            <div class="content shadow p-3 mb-2 wow fadeInUp" data-wow-delay="0.3s">
                                <img src="{{ asset('storage/' . $category->image) }}" class="img-fluid" alt="{{ $category->name }}">
                                <h5 class="my-2">
                                    {{ $category->name }}
                                </h5>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    
    
    
    <!-- Categories End -->

   <!-- Courses Start -->
    <div class="container text-center">
        <a class="btn text-light py-3 px-5 mt-2 mb-5" href="{{ route('public.courses') }}">All Courses</a>
    </div>
    <!-- Courses End -->


    <!-- Frequently Asked Questions Start -->
    <div class="container-xxl py-5 category">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="mb-5">Frequently Asked Questions</h1>
            </div>
            <div class="row g-2">
                <div class="col-12">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="font-size: 1.25rem; color: #0056b3;">
                                    WebMentor ဆိုတာဘာလဲ?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                <div class="accordion-body" style="font-size: 1rem; color: #333;">
                                WebMentor ဆိုတာ web development ကို စတင်လေ့လာမယ့် ကျောင်းသား လူငယ်တွေအတွက် မြန်မာဆရာတွေသင်ပြပေးထားသော free course တွေ articles တွေကို ကျောင်းသားများအလွယ်တကူ တစ်နေရာတည်းမှာလေ့လာနိုင်ရန် ဖော်ပြပေးထားတဲ့ learning platform လေးတစ်ခုဖြစ်ပါတယ်။
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="font-size: 1.25rem; color: #0056b3;">
                                WebMentor ကို ဘယ်လို လူတွေအသုံးပြုနိုင်သလဲ ?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body" style="font-size: 1rem; color: #333;">
                                    web development ကို မြန်မာဘာသာဖြင့် အခြေခံမှစတင် လေ့လာလိုသော ကျောင်းသားများ beginners များအခမဲ့လေ့လာ အသုံးပြုနိုင်ပါတယ်။
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="font-size: 1.25rem; color: #0056b3;">
                                    courses တွေက တကယ်အခမဲ့လား ?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body" style="font-size: 1rem; color: #333;">
                                    ဟုတ်ပါတယ် courses တွေ resources တွေ အားလုံး က free ရနိုင်တဲ့  youtube channels တွေ websits တွေဆီက စုစည်းတင်ပြပေးထားတာဖြစ်ပါတယ်။
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" style="font-size: 1.25rem; color: #0056b3;">
                                course တစ်ခုပြီးရင်ရော certificate ရမှာလား ?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body" style="font-size: 1rem; color: #333;">
                                    certificate မရပါဘူး WebMentor က knowledge နဲ့  skills ပေးချင်တဲ့ learning website လေးဖြစ်ပါတယ်။
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive" style="font-size: 1.25rem; color: #0056b3;">
                                ဘယ်လို courses တွေရနိုင်မလဲ?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body" style="font-size: 1rem; color: #333;">
                                    web development အခြေခံအတွက်လိုအပ်တဲ့ courses တွေ resources တွေ articles တွေကို မြန်မာဘာသာနဲ့လေ့လာရမှာပါ၊
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix" style="font-size: 1.25rem; color: #0056b3;">
                                    content တွေကိုဘယ်သူ ဖန်တီးထားတာလဲ ?
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body" style="font-size: 1rem; color: #333;">
                                contents တွေကိုအတွေ့အကြုံရှိတဲ့ မြန်မာ web developer တွေ ဆရာတွေကဖန်တီးထားတာဖြစ်ပါတယ်။
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven" style="font-size: 1.25rem; color: #0056b3;">
                                    အကြံဥာဏ်ပေးလို့ရောရလား ?
                                </button>
                            </h2>
                            <div id="collapseSeven" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body" style="font-size: 1rem; color: #333;">
                                    ဟုတ်ကဲ့၊ အကြံပြုချက်များကို ကြိုဆိုပါတယ်။ သင့်ရဲ့ အကြံဥာဏ်များ ကို WebMentor ဆီဆက်သွယ်အကြံပြုနိုင်ပါတယ်။
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight" style="font-size: 1.25rem; color: #0056b3;">
                                    ဘယ်လိုဆက်သွယ်ရမလဲ?
                                </button>
                            </h2>
                            <div id="collapseEight" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body" style="font-size: 1rem; color: #333;">
                                WebMentor website ရဲ့ contact form ကနေတဆင့်ဆက်သွယ်နိုင်သလို WebMentor ရဲ့ official email ကိုလဲဆက်သွယ်နိုင်ပါတယ်။
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FAQ End  -->

    <x-footer/>
