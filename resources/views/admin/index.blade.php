@extends('layout.layout')
@include('sass.navbar')
@section('adminindex')
    
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg mt-14">
            <div class="text-4xl font-bold underline">
                <div id="loading-indicator" class="hidden">
                    <!-- Your loading indicator content here -->
                    
                    </div>
            </div>
            <div class="mt-5">
                
            </div>
        </div>
    </div>
@endsection
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Show the loading indicator when the page loads
        const loadingIndicator = document.getElementById("loading-indicator");
        loadingIndicator.style.display = "block";

        // Simulate a loading delay (e.g., 2 seconds) - Replace this with your actual login request logic
        setTimeout(function () {
            // Hide the loading indicator after the delay
            loadingIndicator.style.display = "none";

            // Add your login logic here
        }, 2000); // 2000 milliseconds (2 seconds) - Adjust this as needed
    });
</script>

