<div class="dropdown">
    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
            <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h11a1.5 1.5 0 0 1 0 3h-11A1.5 1.5 0 0 1 1 2.5zm0 5A1.5 1.5 0 0 1 2.5 6h11a1.5 1.5 0 0 1 0 3h-11A1.5 1.5 0 0 1 1 7.5zM1 12a1.5 1.5 0 0 1 1.5-1.5h11a1.5 1.5 0 0 1 0 3h-11A1.5 1.5 0 0 1 1 12z"/>
        </svg>
    </a>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink2">
        <a class="dropdown-item" href="{{ route('product.edit', $product) }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                <path d="M12.742 1.344a1 1 0 0 1 1.415 0l1.543 1.542a1 1 0 0 1 0 1.414l-9.086 9.086c-.47.47-1.47.47-1.94 0l-1.543-1.542a1 1 0 0 1 0-1.414l9.086-9.086a1 1 0 0 1 1.414 0zm1.414 2.828L2 14.828V16h1.172l10.656-10.656-1.414-1.414z"/>
            </svg>
            Edit
        </a>
        <form id="delete-form" action="{{ route('product.delete', $product) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="delete dropdown-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M1.5 3a.5.5 0 0 1 .5-.5h12a.5.5 0 0 1 0 1h-12a.5.5 0 0 1-.5-.5zm1-1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v1H2v-1zM14 5v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5h1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V5h1z"/>
                    <path fill-rule="evenodd" d="M5.5 0a.5.5 0 0 1 .5.5V3h-1V.5a.5.5 0 0 1 1 0zM11.5 0a.5.5 0 0 1 .5.5V3h-1V.5a.5.5 0 0 1 1 0z"/>
                </svg>
                Delete
            </button>
        </form>
    </div>
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.1/dist/js/bootstrap.bundle.min.js"></script> --}}
<script src="{{URL::asset('js/jquery/jquery.min.js')}}"></script>
