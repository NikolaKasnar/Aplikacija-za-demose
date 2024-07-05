<?php 
    if(isset($_COOKIE['ovlasti']) && $_COOKIE['ovlasti'] === '0'){
        require_once __DIR__ . '/../navigation-bars/navigation-bar-admin.php';
    }
    else{
        require_once __DIR__ . '/../navigation-bars/navigation-bar.php';
    }
?>
<?php require_once __DIR__ . '/../navigation-bars/navigation-bar-upute.php'; ?>

<?php require_once __DIR__ . '/../_header.php'; ?>


    <div style="margin-left:25%;padding:1px 16px;">
        <h2>Opis posla</h2>
        <?php if (!empty($error_message)) : ?>
            <p style="color: red;"><?php echo $error_message; ?></p>
        <?php endif; ?>
        <form method="post" action="index.php?rt=upute/opisposla">
            <label for="edited_content">Opis posla:</label><br>
            <textarea id="edited_content" name="edited_content" rows="10" cols="50"><?php echo htmlspecialchars($php_content); ?></textarea><br>
            <button type="submit" value="Save">Save</button>
        </form>
    </div>

    <script>
        // Editor texta
        //TODO Dodati velicinu fonta nekad u buducnosti
        function getCookie(name) {
            let value = `; ${document.cookie}`;
            let parts = value.split(`; ${name}=`);
            if (parts.length === 2) return parts.pop().split(';').shift();
        }

        // Posebne boje za darkmode
        const mode = getCookie('mode');
        if(mode === '0'){
            document.querySelector('#edited_content').style.backgroundColor = '#333';
            document.querySelector('#edited_content').style.color = '#fff';

            const style = document.createElement('style');
            style.type = 'text/css';
            style.innerHTML = 'p { background-color: grey; }';
            document.querySelector('#edited_content').appendChild(style);

            ClassicEditor
                .create(document.querySelector('#edited_content'), {
                    toolbar: {
                        items: [
                            'heading',
                            '|',
                            'bold',
                            'italic',
                            'link',
                            'blockQuote',
                            'numberedList',
                            'undo',
                            'redo'
                        ],
                    },
                    removePlugins: ['CKFinderUploadAdapter', 'bulletedList', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed'],
                    editorConfig: {
                        contentsCss: {
                            'body': {
                                'background-color': '#333',
                                'color': '#fff'
                            },
                            'p': {
                                'background-color': '#333'
                            }
                        }
                    }
                })
                .then(editor => {
                    editor.ui.view.editable.element.style.backgroundColor = 'grey';
                    editor.ui.view.editable.element.style.color = 'white';
                })
                .catch(error => {
                    console.error(error);
                });
        } else {
            ClassicEditor
                .create(document.querySelector('#edited_content'), {
                    toolbar: {
                        items: [
                            'heading',
                            '|',
                            'bold',
                            'italic',
                            'link',
                            'blockQuote',
                            'numberedList',
                            'undo',
                            'redo'
                        ],
                    },
                    // Micanje uplaoda slika
                    removePlugins: ['CKFinderUploadAdapter', 'bulletedList', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed'],
                })
                .catch( error => {
                        console.error( error );
                    } 
                );
            }        
    </script>
</body>

</html>
