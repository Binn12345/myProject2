@extends('layout.layout')

@section('publicindex')
    

{{-- <section class="bg-gray-50 dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
          
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Login to Your Account
                    </h1>
                    <p class="text-sm text-blue-900 md:text-2sm">Enter your personal details to create account</p>
                    <form class="space-y-4 md:space-y-6" action="#">
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username or Email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" >
                                </div>
                                <div class="ml-3 text-sm">
                                <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                                </div>
                            </div>
                            <a href="#" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Forgot password?</a>
                        </div>
                        <button type="button" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-black hover:bg-gray-600 hover:duration-300 hover:text-white" id='login' data-url='{{route("/check")}}' data-dashboard='{{route("adminindex")}}'>Sign in</button>
                        <p class="text-sm font-light text-gray-500">
                            Don’t have an account yet? <a href="{{ route('register')}}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up</a>
                        </p>
                    </form>
                </div>
               
        </div>
        
    </div>
    
  </section> --}}
  {{-- @php
    (get_defined_vars());
  @endphp --}}
  <section class="bg-gray-50 dark:bg-gray-900">
    <div class="flex flex-col mt-32 md:mt-0 md:flex-row items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <!-- First Card -->
        {{-- <div class="w-full md:w-1/2 bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700"> --}}
            <!-- ... (content of the first card) ... -->
            {{-- <div class="w-full md:w-1/2 bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700"> --}}
                <div class="w-full bg-white rounded-lg shadow dark:border md:mt-2 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700 ">
                  
                        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                            <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                                {{-- Login your account --}}
                            </h1>
                            <p class="text-lg text-blue-900 md:text-2sm">Enter your personal details to create account</p>
                            <form class="space-y-4 md:space-y-6" action="#">
                                <div>
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username or Email</label>
                                    <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="username">
                                </div>
                                <div>
                                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                    <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-start">
                                        <div class="flex items-center h-5">
                                        <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" >
                                        </div>
                                        <div class="ml-3 text-sm">
                                        <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                                        </div>
                                    </div>
                                    <a href="#" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Forgot password?</a>
                                </div>
                                <button type="button" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-black hover:bg-gray-600 hover:duration-300 hover:text-white" id='login' data-url='{{route("/check")}}' data-dashboard='{{route("adminindex")}}'>Sign in</button>
                                <p class="text-sm font-light text-gray-500">
                                    Don’t have an account yet? <a href="{{ route('register')}}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up</a>
                                </p>
                            </form>
                        </div>
                       
                {{-- </div> --}}
                
            </div>
        {{-- </div> --}}
        
        <!-- Second Card -->
        <div class="w-full md:w-1/2 bg-transparent md:mt-1 sm:max-w-md xl:p-0 mt-10">
            <!-- ... (content of the second card) ... -->
            @include('layout.svg')
        </div>
    </div>
</section>


<script type="text/javascript">
$(document).ready(function(){
    $('#login').click(function(e){
        
        e.preventDefault();
        const emailValue = $("#email").val().trim();
        const passwordValue = $("#password").val().trim();

        let errorMessage = "";

        switch (true) {
            case emailValue === "" && passwordValue === "":
                errorMessage = "All fields required";
                break;
            case emailValue === "":
                errorMessage = "Email address required";
                break;
            case passwordValue === "":
                errorMessage = "Password required";
                break;
            default:
                break;
        }

        if (errorMessage !== "") {
            Swal.fire({
                icon: "error",
                title: "Validation Error",
                text: errorMessage,
            });

            return;
        }

        const url = $("#login").data("url");
        const dashboardUrl = $("#login").data("dashboard");

        axios.post(url, {
            email: emailValue,
            password: passwordValue,
        })
        .then(function () {
            window.location.href = dashboardUrl;
        })
        .catch(function (error) {
            Swal.fire({
                icon: "error",
                title: "Access Denied",
                text: error.response.data.error,
            });
        });
    });
   

});
</script>
@endsection