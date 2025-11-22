@extends('layouts.app')

<?php

$testimonials = [
    [
        'quote' => "This performance evaluation system is truly transformative. We can now measure teaching quality with objective metrics, which is crucial for maintaining our international accreditation.",
        'name' => 'Prof. Dr. Anton Wiguna',
        'role' => 'Dean of Engineering, University of Indonesia',
        'image_url' => 'https://images.unsplash.com/photo-1633332755192-727a05c4013d?q=80&w=200'
    ],
    [
        'quote' => "The platform’s data analytics provide quick, actionable insights. It saves our department countless hours during our annual faculty performance reviews.",
        'name' => 'Dr. Eleanor Vance',
        'role' => 'Head of Research, University of Cambridge',  
        'image_url' => 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?q=80&w=200'
    ],
    [
        'quote' => "We utilized this system to accurately map faculty training needs. As a result, our development programs are far more targeted and impactful.",
        'name' => 'Dr. Rina Puspita Sari',
        'role' => 'Head of Quality Assurance Center, Gadjah Mada University',
        'image_url' => 'https://images.unsplash.com/photo-1527980965255-d3b416303d12?w=200&auto=format&fit=crop&q=60'
    ],
    
];

?>

@section('content')

<div id="home" class="flex flex-row items-center min-h-screen max-w-6xl mx-auto">
    <div class="w-full flex flex-col items-start gap-5">
        <div class="flex flex-col items-start gap-6">
            <h1 class="text-6xl font-black max-w-xl">Teacher Evaluate System</h1>
            <div class="flex flex-col gap-0">
                <p class="text-lg">Hari yang ditunggu telah tiba.</p>
                <p>Kami memberi kemudahan untuk semua</p>
            </div>
        </div>
        @auth
            <a href="student" class="rounded-sm px-4 py-3 bg-blue-700 hover:bg-blue-800 transition-all duration-300 ease-out text-white font-semibold">My Courses</a>
        @else 
            <a href="student/login" class="rounded-sm px-4 py-3 bg-blue-700 hover:bg-blue-800 transition-all duration-300 ease-out text-white font-semibold">Login To Your Account</a>
        @endauth
    </div>
    <div class="hidden md:flex w-full flex-col items-center">
        <img src="{{ asset('images/hero.png') }}" alt="description of myimage">
    </div>
</div>

<div id="about" class="bg-[#F2F2F2] w-full flex flex-col items-center justify-center py-12 gap-y-12 ">
    <div class="header">
        <p class="font-black text-4xl">What is TES for?</p>
    </div>
    <div class="content max-w-6xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="p-6 rounded-xl shadow-xl hover:shadow-2xl transition-shadow duration-300">
                <div class="flex justify-center mb-4">
                    <svg class="w-12 h-12 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.5l.5-1.5h-1L12 6.5zM12 6.5L10 12h4L12 6.5zm-5 6L5 17h14l-2-4h-10z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">For Teachers</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-6">
                    <b>Self-Improvement Focus.</b> Easy-to-use reflection tools and detailed performance reports to find strengths and areas for professional growth.
                </p>
                <a href="#" class="text-blue-600 dark:text-blue-400 font-medium hover:underline">
                    Learn more
                </a>
            </div>

            <div class="p-6 rounded-xl shadow-xl hover:shadow-2xl transition-shadow duration-300">
                <div class="flex justify-center mb-4">
                    <svg class="w-12 h-12 text-yellow-500 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10a2 2 0 01-2 2h-4v-4a2 2 0 00-2-2h-4a2 2 0 00-2 2v4H6a2 2 0 01-2-2V7m16 0L12 3"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">For Administrators</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-6">
                    <b>Efficient Performance Management.</b> Streamline observation, assessment, and structured feedback processes based on curriculum standards.
                </p>
                <a href="#" class="text-blue-600 dark:text-blue-400 font-medium hover:underline">
                    Learn more
                </a>
            </div>
            
            <div class="p-6 rounded-xl shadow-xl hover:shadow-2xl transition-shadow duration-300">
                <div class="flex justify-center mb-4">
                    <svg class="w-12 h-12 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-6v6m-4-2v2m12-9h-4L8 3v4H4a2 2 0 00-2 2v10a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">For School Boards</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-6">
                    <b>Data-Driven Decisions.</b> Provides aggregated data and analytics on educator performance trends for strategic planning and quality assurance.
                </p>
                <a href="#" class="text-blue-600 dark:text-blue-400 font-medium hover:underline">
                    Learn more
                </a>
            </div>

            <div class="p-6 rounded-xl shadow-xl hover:shadow-2xl transition-shadow duration-300">
                <div class="flex justify-center mb-4">
                    <svg class="w-12 h-12 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l-2-2m-3 3h-2m5 2h-4v4h4v-4zm-4 4v2a1 1 0 001 1h3"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">For Parents</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-6">
                    <b>Teaching Quality Insight.</b> Offers general insights into the school's teaching quality, building trust in the educational standards.
                </p>
                <a href="#" class="text-blue-600 dark:text-blue-400 font-medium hover:underline">
                    Learn more
                </a>
            </div>
        </div>
    </div>
</div>

<section id="about" class="w-full flex flex-col items-center justify-center py-16 px-4">
    <div class="header mb-12 text-center">
        <h2 class="font-black text-4xl text-gray-900 dark:text-white">How does TES work?</h2>
    </div>

    <div class="content max-w-4xl mx-auto space-y-16">

        <div class="flex flex-col md:flex-row items-center gap-6 md:gap-12">
            <div class="w-full md:w-1/2 flex justify-center md:justify-end">
                <img class="size-48 md:size-64 rounded-xl object-cover" src="{{ asset("images/explain1.png") }}" alt="Step 1: Select Your Course Illustration">
            </div>
            
            <div class="w-full md:w-1/2 flex flex-col items-center md:items-start text-center md:text-left">
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Select Your Course</h3>
                <p class="mt-2 text-lg text-gray-600 dark:text-gray-400">
                    Here, you can take any course you want on any topic, in any languages.
                </p>
            </div>
        </div>
        
        <div class="flex flex-col md:flex-row items-center gap-6 md:gap-12">
            
            <div class="w-full md:w-1/2 flex flex-col items-center md:items-end text-center md:text-right md:order-1">
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Answering</h3>
                <p class="mt-2 text-lg text-gray-600 dark:text-gray-400">
                    It only take a few minutes to answering simple questions.
                </p>
            </div>

            <div class="w-full md:w-1/2 flex justify-center md:justify-start md:order-2">
                <img class="size-48 md:size-64 rounded-xl object-cover" src="{{ asset("images/explain2.png") }}" alt="Step 2: Answering Illustration">
            </div>
        </div>

        <div class="flex flex-col md:flex-row items-center gap-6 md:gap-12">
            <div class="w-full md:w-1/2 flex justify-center md:justify-end">
                <img class="size-48 md:size-64 rounded-xl object-cover" src="{{ asset("images/explain3.png") }}" alt="Step 3: Claim your point Illustration">
            </div>
            
            <div class="w-full md:w-1/2 flex flex-col items-center md:items-start text-center md:text-left">
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Claim your point</h3>
                <p class="mt-2 text-lg text-gray-600 dark:text-gray-400">
                    After submit, you can see your grades for this course.
                </p>
            </div>
        </div>

    </div>
</section>

<section id="what-they-say" class="flex flex-col items-start px-6 md:px-16 lg:px-24 text-sm max-w-6xl mx-auto my-4 lg:my-12">

    <div class="flex flex-row items-center justify-center">    
        <h1 class="text-4xl font-black bg-gradient-to-r from-slate-800 to-slate-500 text-transparent bg-clip-text my-4">
        What They Say
        </h1>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-10">


            @foreach ($testimonials as $data)
                <div class="border border-slate-200 p-6 rounded-lg hover:-translate-y-1 hover:shadow-xl hover:border-transparent transition duration-500">
                    <p class="text-base text-slate-500">
                        <?= $data['quote'] ?>
                    </p>
                    <div class="flex items-center gap-3 mt-8">
                        <img class="size-12 rounded-full" src="<?= $data['image_url'] ?>" alt="user image">
                        <div>
                            <h2 class="flex items-center gap-2 text-base text-gray-900 font-medium">
                                <?= $data['name'] ?>
                            </h2>
                            <p class="text-gray-500"><?= $data['role'] ?></p>
                        </div>
                    </div>
                </div>
            @endforeach
        
        
    </div>
</section>  



<footer class="bg-neutral-primary-soft">
    <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
        <div class="md:flex md:justify-between">
          <div class="mb-6 md:mb-0">
              <a href="/" class="flex items-center">
                  <span class="text-heading self-center text-2xl font-semibold whitespace-nowrap">Teacher Evaluate System</span>
              </a>
          </div>
          <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
              <div>
                  <h2 class="mb-6 text-sm font-semibold text-heading uppercase">Resources</h2>
                  <ul class="text-body font-medium">
                      <li class="mb-4">
                          <a href="/student/login" class="hover:underline">Student</a>
                      </li>
                      <li>
                          <a href="/admin/login" class="hover:underline">Teacher</a>
                      </li>
                  </ul>
              </div>
              <div>
                  <h2 class="mb-6 text-sm font-semibold text-heading uppercase">Follow us</h2>
                  <ul class="text-body font-medium">
                      <li class="mb-4">
                          <a href="https://github.com/themesberg/flowbite" class="hover:underline ">Github</a>
                      </li>
                      <li>
                          <a href="https://discord.gg/4eeurUVvTy" class="hover:underline">Discord</a>
                      </li>
                  </ul>
              </div>
              <div>
                  <h2 class="mb-6 text-sm font-semibold text-heading uppercase">Legal</h2>
                  <ul class="text-body font-medium">
                      <li class="mb-4">
                          <a href="#" class="hover:underline">Privacy Policy</a>
                      </li>
                      <li>
                          <a href="#" class="hover:underline">Terms &amp; Conditions</a>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
    </div>
</footer>


@endsection