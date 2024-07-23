<x-header/>

 <div class="container-fluid" style="margin:0; padding:0">
    <div class="row no-gutters h-100">
        <div class="col-12 p-0 h-100">
            <img src="/img/roadmap.png" alt="roadmap" class="full-screen-img">
        </div>

      <!-- Roadmap Section -->
      <div style="margin: 2% 5% 0 5%; width:90% " >
        <section>
            <div class="card-deck">
                <!-- Frontend Development Card -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3" style="font-size:2rem">
                            <i class="fab fa-html5 mr-2 "></i> Frontend Development
                        </h5>
                        <p  style="font-weight:bold">Frontend developer ဆိုတာ HTML,CSS, JavaScript, JS Framework စတာတွေကိုအသုံးပြုပြီးတော့ web frontend application  တွေ ရေးသားရတဲ့ developer ကိုဆိုလိုတာပါ။ </p>
                        <p class="card-text">
                            <strong>Steps:</strong>
                            <ol style="line-height: 3rem">
                                <li> HTML ကိုလေ့လာရပါမယ်။ အထူးသဖြင့် HTML5 ပါ။</li>
                                <li> CSS ကိုလေ့လာရပါမယ်။ CSS ကိုမှ နောက်ထွက်တဲ့ flexbox တွေ ကိုနားလည်ရပါမယ်။ နောက် responsive design ကိုနားလည်ရပါမယ်။ နောက် responsive CSS framework တွေဖြစ်တဲ့ bootstrap လိုကောင်တွေကို နားလည်ရပါမယ်။  Browser တွေ အလုပ်လုပ်ပုံကိုနားလည်ရပါမယ်။</li>
                                <li>JavaScript ကို နားလည်ရပါမယ်။ ES6, ES7 လောက်ထိလေ့လာသင့်ပါတယ်။ JS မှာ paradigm 2 ခုရှိပါတယ်။ OO နဲ. FP ပါ ၂ ခုလုံးကို နားလည်အောင်လုပ်သင့်ပါတယ်။</li>
                                <li>JS ကိုနားလည်သွားမှ ဆိုင်ရာ Angular, React, Vue အစရှိတာတွေကို လေ့လာသင့်ပါတယ်။</li>
                            </ol>
                        </p>
                        <a href="{{ route('public.courses') }}" class="btn btn-course">Explore Frontend Courses</a>
                    </div>
                </div>
    
                <!-- Backend Development Card -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3 " style="font-size:2rem"> <i class="fa fa-database"></i>
                            Backend Development</h5>
                        <p style="font-weight:bold"> Backend Developer လို.ပြောလိုက်ရင် Web Application Framework တခုခုကိုသုံးပြီးတော့ web application,mobile application အတွက်လိုအပ်တဲ့ buiness logic တွေလုပ်ပေးရတဲ့သူကိုဆိုလိုတာပါ။</p>
                        <p class="card-text">
                            <strong>Steps:</strong>
                            <ol style="line-height:3rem">
                                <li>TCP/IP networking ထဲက TCP level လောက်ကိုလေ့လာထားသင့်ပါတယ်။
                                    Networking basic concept တွေ protocol တွေဘယ်လိုအလုပ်လုပ်သလဲ။ 
                                    Internet ဘယ်လိုအလုပ်လုပ်သလဲ
                                    WebServer တွေ HTTP protocol ဘယ်လိုအလုပ်လုပ်သလဲ လေ့လာရပါမယ်။ </li>
                                <li>နောက် Server Side Programming Language တခုခုကို သေချာနားလည်သင့်ပါတယ်။ ဥပမာ Fraemwork အရင် learn ပြီး language မသိတာမျိုး မဖြစ်သင့်ပါဘူး။ Server Side programming language ဆိုရင် ဘာတွေရှိလဲဆိုတော့ Java, C# , Go, Python, PHP, JavaScript အစရှိတာတွေ လေ့လာသင့်ပါ့တယ်။</li>
                                <li>နောက်က ဆိုင်ရာ ကိုယ်သုံးမဲ့ Programming lanuage ပေါ်မူတည်ပြီး framework တွေကိုနားလည်သင့်ပါတယ်. ဥပမာ Java မှာ ဆို Spring လိုကောင်တွေ PHP ဆို Laravel, Python ဆို Danjo , Node.js ဆို Express, Nest.js လိုကောင်တွေသိသင့်ပါတယ်။</li>
                                <li>နောက် Web Application တွေရေးတဲ့အခါ database ကမပါမဖြစ်ပါ၊ ကိုယ်သုံးမဲ့ DBMS , NoSQL အစရှိတာတွေကို နားလည်သင့်ပါတယ်၊ နောက် SQL language ကိုကောင်းကောင်းနားလည်သင့်ပါတယ်။</li>
                                <li>နောက် Application security , Authentication, Authorization တွေသိဖို.လိုပါတယ်. JWT လို ကောင်တွေရောပေါ့။ OWASP Top Ten ကကောင်တွေ နားလည်ထားရင်ပိုကောင်းတာပေါ့။</li>
                            </ol>
                        </p>
                        <a href="{{ route('public.courses')}}" class="btn btn-course">Explore Backend Courses</a>
                    </div>
                </div>
    
                <!-- Full Stack Development Card -->
                {{-- <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Full Stack Development</h5>
                        <p class="card-text">
                            <strong>Steps:</strong>
                            <ol>
                                <li>Integrate frontend and backend technologies.</li>
                                <li>Deploy full-fledged web applications.</li>
                                <li>Implement real-time features with web sockets.</li>
                                <li>Ensure application security and performance optimization.</li>
                                <li>Manage project workflow and version control.</li>
                            </ol>
                        </p>
                        <a href="#" class="btn btn-course ">Explore Full Stack Courses</a>
                    </div>
                </div> --}}
            </div>
         </section>
      </div>
    <!-- End Roadmap Section -->
 </div>
<x-footer/>