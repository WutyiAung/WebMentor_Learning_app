<x-header/>

<div class="container-fluid p-0">
    <div class="row no-gutters h-100">
        <div class="col-12 p-0 h-100 d-flex align-items-center justify-content-center">
            <img src="/img/roadmap.webp" alt="roadmap" class="centered-img">
        </div>

        <!-- Roadmap Section -->
        <div class="container py-5" style="width:90%;">
            <section>
                <div class="card-deck">
                    <!-- Frontend Development Card -->
                    <div class="card shadow-lg mb-4">
                        <div class="card-body">
                            <h5 class="card-title mb-3" style="font-size:2rem; color: var(--primary);">
                                <i class="fab fa-html5 mr-2" style="color: #e34c26;"></i> Frontend Development
                            </h5>
                            <p class="card-text" style="font-weight:bold; color: #333;">Frontend developer ဆိုတာ HTML,CSS, JavaScript, JS Framework စတာတွေကိုအသုံးပြုပြီးတော့ web frontend application  တွေ ရေးသားရတဲ့ developer ကိုဆိုလိုတာပါ။</p>
                            <p class="card-text">
                                <strong style="color: var(--primary);">Steps:</strong>
                                <ol style="line-height: 2rem; margin-left: 1.5rem;">
                                    <li>HTML ကိုလေ့လာရပါမယ်။ အထူးသဖြင့် HTML5 ပါ။</li>
                                    <li>CSS ကိုလေ့လာရပါမယ်။ CSS ကိုမှ နောက်ထွက်တဲ့ flexbox တွေ ကိုနားလည်ရပါမယ်။ နောက် responsive design ကိုနားလည်ရပါမယ်။ နောက် responsive CSS framework တွေဖြစ်တဲ့ bootstrap လိုကောင်တွေကို နားလည်ရပါမယ်။ Browser တွေ အလုပ်လုပ်ပုံကိုနားလည်ရပါမယ်။</li>
                                    <li>JavaScript ကို နားလည်ရပါမယ်။ ES6, ES7 လောက်ထိလေ့လာသင့်ပါတယ်။ JS မှာ paradigm 2 ခုရှိပါတယ်။ OO နဲ. FP ပါ ၂ ခုလုံးကို နားလည်အောင်လုပ်သင့်ပါတယ်။</li>
                                    <li>JS ကိုနားလည်သွားမှ ဆိုင်ရာ Angular, React, Vue အစရှိတာတွေကို လေ့လာသင့်ပါတယ်။</li>
                                </ol>
                            </p>
                            <a href="{{ route('public.courses') }}" class="btn btn-sm btn-primary btn-lg mt-3">Explore Frontend Courses</a>
                        </div>
                    </div>

                    <!-- Backend Development Card -->
                    <div class="card shadow-lg mb-4">
                        <div class="card-body">
                            <h5 class="card-title mb-3" style="font-size:2rem; color: var(--primary);">
                                <i class="fa fa-database mr-2" style="color: #4caf50;"></i> Backend Development
                            </h5>
                            <p class="card-text" style="font-weight:bold; color: #333;">Backend Developer လို.ပြောလိုက်ရင် Web Application Framework တခုခုကိုသုံးပြီးတော့ web application,mobile application အတွက်လိုအပ်တဲ့ buiness logic တွေလုပ်ပေးရတဲ့သူကိုဆိုလိုတာပါ။</p>
                            <p class="card-text">
                                <strong style="color: var(--primary);">Steps:</strong>
                                <ol style="line-height: 2rem; margin-left: 1.5rem;">
                                    <li>TCP/IP networking ထဲက TCP level လောက်ကိုလေ့လာထားသင့်ပါတယ်။ Networking basic concept တွေ protocol တွေဘယ်လိုအလုပ်လုပ်သလဲ။ Internet ဘယ်လိုအလုပ်လုပ်သလဲ WebServer တွေ HTTP protocol ဘယ်လိုအလုပ်လုပ်သလဲ လေ့လာရပါမယ်။</li>
                                    <li>နောက် Server Side Programming Language တခုခုကို သေချာနားလည်သင့်ပါတယ်။ ဥပမာ Fraemwork အရင် learn ပြီး language မသိတာမျိုး မဖြစ်သင့်ပါဘူး။ Server Side programming language ဆိုရင် ဘာတွေရှိလဲဆိုတော့ Java, C# , Go, Python, PHP, JavaScript အစရှိတာတွေ လေ့လာသင့်ပါ့တယ်။</li>
                                    <li>နောက်က ဆိုင်ရာ ကိုယ်သုံးမဲ့ Programming lanuage ပေါ်မူတည်ပြီး framework တွေကိုနားလည်သင့်ပါတယ်. ဥပမာ Java မှာ ဆို Spring လိုကောင်တွေ PHP ဆို Laravel, Python ဆို Django , Node.js ဆို Express, Nest.js လိုကောင်တွေသိသင့်ပါတယ်။</li>
                                    <li>နောက် Web Application တွေရေးတဲ့အခါ database ကမပါမဖြစ်ပါ၊ ကိုယ်သုံးမဲ့ DBMS , NoSQL အစရှိတာတွေကို နားလည်သင့်ပါတယ်၊ နောက် SQL language ကိုကောင်းကောင်းနားလည်သင့်ပါတယ်။</li>
                                    <li>နောက် Application security , Authentication, Authorization တွေသိဖို.လိုပါတယ်. JWT လို ကောင်တွေရောပေါ့။ OWASP Top Ten ကကောင်တွေ နားလည်ထားရင်ပိုကောင်းတာပေါ့။</li>
                                </ol>
                            </p>
                            <p>ကဲ ဒီလောက်ဆိုရင်တော့ beginners တွေအနေနဲ့ step by step လေ့လာလို့ရမယ့် learning guide လေးရသွားလိမ့်မယ်လို့မျှော်လင့်ပါတယ်။💕
                            <p> courses တွေကို WebMentor ရဲ့ course section မှာလေ့လာနိုင်ပါတယ်ရှင့်။👀</p>
                            </p>
                            <a href="{{ route('public.courses') }}" class="btn btn-sm btn-primary btn-lg mt-3">Explore Backend Courses</a>
                        </div>
                    </div>

                    <!-- Full Stack Development Card (Optional) -->
                    {{-- <div class="card shadow-lg mb-4">
                        <div class="card-body">
                            <h5 class="card-title mb-3" style="font-size:2rem; color: var(--primary);">
                                <i class="fas fa-code-branch mr-2" style="color: #ff5722;"></i> Full Stack Development
                            </h5>
                            <p class="card-text">
                                <strong style="color: var(--primary);">Steps:</strong>
                                <ol style="line-height: 2rem; margin-left: 1.5rem;">
                                    <li>Integrate frontend and backend technologies.</li>
                                    <li>Deploy full-fledged web applications.</li>
                                    <li>Implement real-time features with web sockets.</li>
                                    <li>Ensure application security and performance optimization.</li>
                                    <li>Manage project workflow and version control.</li>
                                </ol>
                            </p>
                            <a href="#" class="btn btn-primary btn-lg mt-3">Explore Full Stack Courses</a>
                        </div>
                    </div> --}}
                </div>
            </section>
        </div>
        <!-- End Roadmap Section -->
    </div>
</div>

<style>
    li{
        font-size: 1rem;
    }
    .centered-img {
        max-width: 100%;
        height: 80vh;
        display: block;
    }

    .col-12.p-0.h-100 {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .card {
        border: none;
        border-radius: 12px;
    }

    .card-body {
        padding: 2rem;
    }

    .card-title {
        font-weight: 700;
    }

    .btn-course {
        background-color: var(--primary);
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 0.75rem 1.5rem;
        font-size: 1rem;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .btn-course:hover {
        background-color: darken(var(--primary), 10%);
    }

    .shadow-lg {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1), 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .shadow-lg:hover {
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2), 0 6px 16px rgba(0, 0, 0, 0.2);
    }
</style>

<x-footer/>
