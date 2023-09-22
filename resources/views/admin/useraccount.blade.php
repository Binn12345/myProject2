@extends('layout.layout')
@include('sass.navbar')
@section('accountsindex')

<div class="mt-10"></div>
<div class="p-4 lg:ml-64">

        <div class="w-full bg-white rounded-lg shadow border xs:md-10 md:mt-4 lg:mt-4 mt-4 xl:p-0 bg-gray-800 border-gray-300">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <form id=registrationFormV2>
                    @csrf
                    <div class="grid lg:grid-cols-3 gap-3 grid-cols-1 lg:mb-5">
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" name="emailV2" id="emailV2" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="name@company.com" required="">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="passwordV2" id="passwordV2" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                        </div>
                        <div>
                            <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm password</label>
                            <input type="password" name="confirm-password" id="confirm-passwordV2" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                        </div>
                        
                    </div>
                    {{-- <div class="grid lg:grid-cols-4 gap-3 md:grid-cols-1 xs:grid-cols-1 mb-3 lg:mb-5">
                        <div></div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="name@company.com" required="">
                        </div>
                        <div></div>
                    </div> --}}
                    
                    <button type="button" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-black hover:bg-gray-600 hover:duration-300 hover:text-white" id="addUser">Create</button>
                </form>
            </div>
        </div>
        {{-- <div class="grid grid-cols-1 mt-3">
             --}}
            <div class="w-full p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700 mt-3">

                <table id="dynamic_Datable" class="mt-5 text-black bg-white nowrap display datatable" cellspacing="0" style="width:100%">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th></th>
                            {{-- <th></th>
                            <th></th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        {{-- data ajax --}}
                    </tbody>
                </table>
        
            </div>
        {{-- </div> --}}
        
  
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script type="text/javascript">
         
         $(document).ready(function(){
            $('#addUser').on('click',function(e){
                e.preventDefault();

                const password = $('#passwordV2').val();
                const passwordV2 = $('#confirm-passwordV2').val();
                if(passwordV2 !== password)
                {
                    alert('errror');
                    return;

                }
                var formData = $("#registrationFormV2").serialize();
                
                $.ajax({
                    type: "POST", 
                    url: "{{ route('storedata') }}",    
                    data: formData,
                    success: function(response) {
                        
                        
                        const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 4000,
                        background: '#59b259',
                        color: '#ffff',
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.resumeTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                        })
                        Toast.fire({
                            icon: 'success',
                            title: response['message']
                        })
                        
                        table.ajax.reload();


                    },
                    
                    error: function(error){
                        if (error.status === 422) {
                            // Handle validation errors, e.g., display them to the user
                            var errors = error.responseJSON.errors;
                            for (var field in errors) {
                                // Display errors for each field
                            const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 4000,
                                    background: '#f64341',
                                    color: '#ffff',
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal.resumeTimer)
                                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                                    }
                                })
                                Toast.fire({
                                    icon: 'error',
                                    title: errors[field][0]
                                })
                            }
                        } else {
                            // Handle other errors
                            const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 4000,
                            background: '#f64341',
                            color: '#ffff',
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.resumeTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                            })
                            Toast.fire({
                                icon: 'error',
                                title: 'djsiajdioasjiod',
                            })
                        }
                        
    
                    }
                });
           }); 

           const table = new DataTable('#dynamic_Datable', {
                scrollX : true,
                
                ajax: {
                    url: "{{ route('storeinfos') }}",
                    dataSrc: "",
                },
                "columns": [
                    {
                        data: null, // * USE NULL DATA SOURCE FOR THE NUMBERING COLUMN * //
                        orderable: true, // * DISABLE SORTING FOR THIS COLUMN * //
                        searchable: false, // * DISABLE SEARCHING FOR THIS COLUMN * //
                        render: function (data, type, row, meta) {
                            return meta.row + 1;
                        },
                    },
                    { "data": "name" },
                    { "data": "email" },
                    { "data": "password" },
                    {
                        data: null,
                        render: function (data, type, row) {
                            // * ADD ACTION BUTTONS OR ANY OTHER CUSTOM RENDERING HERE * //
                            return (
                                '<button class="editBtn text-white rounded-md p-2" id="editBtn">'+

                                '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">'+
  '<path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />'+
  '<path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />'+
'</svg>'+
                                "</button > " +
                                '<button class="deleteBtn text-white rounded-md p-2 ml-2" id="deleteBtn" data-id="' +
                                row.id +
                                '">' +
                                '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">' +
                                '<path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z" clip-rule="evenodd" />' +
                                " </svg>" +
                                "</button > "
                            );
                        },
                    }
                ]
            });

            


           
    });
        


  
</script>
@endsection
