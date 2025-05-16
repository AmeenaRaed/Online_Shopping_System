<div class="fixed left-0 top-0 h-screen w-[15rem] bg-muted-rose text-white p-6 shadow-lg">
    <h5 class="text-2xl font-bold mb-6 text-center">Supplier Panel</h5>
    <nav class="space-y-3">

        <!-- Products -->
        <a href="/supplier" class="text-white text-decoration-none">
            <div class="flex items-center p-3 rounded-lg hover:bg-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-box-seam-fill" viewBox="0 0 16 16">
                    <path
                        d="M6.5 0h3L15 2.5v11L9.5 16h-3L1 13.5v-11L6.5 0zm3 1h-3v.991l3 .857V1zm-3 2.52v.983l3 .857v-.983l-3-.857zM9.5 3.4v.983l3 .857v-.983l-3-.857zM1.5 2.5l3 .857v.983l-3-.857V2.5zM1.5 5.17l3 .857v.983l-3-.857v-.983zm0 2.67l3 .857v.983l-3-.857v-.983zm0 2.67l3 .857v.983l-3-.857v-.983zM9.5 8.3v.983l3 .857v-.983l-3-.857zm0 2.67v.983l3 .857v-.983l-3-.857z" />
                </svg>
                &nbsp;Products
            </div>
        </a>
        <!--Reports-->
        <a href="/supplier/reports" class="text-white text-decoration-none">
            <div class="flex items-center p-3 rounded-lg hover:bg-gray-700"><svg xmlns="http://www.w3.org/2000/svg"
                    width="16" height="16" fill="currentColor" class="bi bi-clipboard2-data-fill" viewBox="0 0 16 16">
                    <path
                        d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5" />
                    <path
                        d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585q.084.236.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5q.001-.264.085-.5M10 7a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0zm-6 4a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0zm4-3a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0V9a1 1 0 0 1 1-1" />
                </svg>&nbsp;Reports</div>
        </a>
        <!--Logout-->
        <div class="flex items-center p-3 rounded-lg hover:bg-gray-700"><svg xmlns="http://www.w3.org/2000/svg"
                width="16" height="16" fill="currentColor" class="bi bi-clipboard2-data-fill" viewBox="0 0 16 16">
                <path
                    d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5" />
                <path
                    d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585q.084.236.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5q.001-.264.085-.5M10 7a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0zm-6 4a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0zm4-3a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0V9a1 1 0 0 1 1-1" />
            </svg>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="button" id="logout-btn">Logout</button>
            </form>

        </div>



    </nav>
</div>