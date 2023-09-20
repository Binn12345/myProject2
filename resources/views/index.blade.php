@extends('layout.layout')

@section('publicindex')
    

<section class="bg-gray-50 dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
            <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo">
            ...  
        </a>
        <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Sign in to your account
                </h1>
                <form class="space-y-4 md:space-y-6" action="#">
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
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
                        Don’t have an account yet? <a href="#" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
  </section>


<script type="text/javascript">

$(document).ready(function(){
    $('#login').click(function(e){
        //     const Toast = Swal.mixin({
        //     toast: true,
        //     position: 'top-end',
        //     showConfirmButton: false,
        //     timer: 4000,
        //     background: '#59b259',
        //     color: '#ffff',
        //     timerProgressBar: true,
        //     didOpen: (toast) => {
        //         toast.addEventListener('mouseenter', Swal.resumeTimer)
        //         toast.addEventListener('mouseleave', Swal.resumeTimer)
        //     }
        // })
        // Toast.fire({
        //     icon: 'success',
        //     title: "djsidjosjdio"
        // })

        e.preventDefault();
        const emailValue = $("#email").val().trim();
        const passwordValue = $("#password").val().trim();

        let errorMessage = "";

        switch (true) {
            case emailValue === "" && passwordValue === "":
                errorMessage = "Please enter both email and password!";
                break;
            case emailValue === "":
                errorMessage = "Please enter your email address!";
                break;
            case passwordValue === "":
                errorMessage = "Please enter your password!";
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
                title: "Login Error",
                text: error.response.data.error,
            });
        });
    });
   

});
</script>
@endsection