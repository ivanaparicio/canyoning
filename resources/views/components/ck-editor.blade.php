
<div id="body" class="ck-content">
</div>

@push('js')

    <script src="https://cdn.ckeditor.com/ckeditor5/27.0.0/classic/ckeditor.js"></script>

    <script>
        //CKEDITOR

        let editor;
        ClassicEditor
        .create( document.querySelector('#body'),{
            toolbar: {
                items: [
                    '|', 'heading',
                    '|', 'bold', 'italic',
                    '|', 'bulletedList', 'numberedList', 'outdent', 'indent'
                ],
                shouldNotGroupWhenFull: false
            }
        })
        .then( newEditor => {
            editor = newEditor;
        })
        .catch( error => {
            console.log( error );
        });

        document.addEventListener('livewire:load', function () {
            editor.setData(@this.body);
        })

        document.querySelector( '#save' ).addEventListener( 'click', () => {
            @this.body = editor.getData();
        } );

    </script>
@endpush
