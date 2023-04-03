<div>
    <div x-data="mainViewer()"
        x-show="open"
        x-init="isResize()"
        x-on:resize.window="isResize()"
        x-on:close.stop="open = false"
        x-on:keydown.escape.window="open = false"
        x-on:set-url.window="url = $event.detail; open=true; showViewer()"
        class="fixed inset-0 z-50 bg-black">
        <div class="h-full w-full relative flex items-center justify-center pb-3">

            <img id="imageViewer" class="object-cover object-center max-w-full max-h-screen" :src="url" >

            <div class="absolute top-0 inset-x-0  bg-black flex justify-end items-center px-4 h-12 space-x-4">

                <button x-on:click="openFullScreen()" class="text-gray-500 transition-colors duration-300 hover:text-white text-xl font-semibold focus:outline-none">
                    <i class="ico " :class="isFullScreen ? 'icon-compress' : 'icon-expand' "></i>
                </button>

                <button x-on:click="closeFullScreen(); showViewer()" class="text-gray-500 transition-colors duration-300 hover:text-white text-3xl font-semibold focus:outline-none">
                    &times;
                </button>

            </div>
        </div>

    </div>
</div>

@push('js')
    <script>
        function mainViewer(){

            return {
                open: false,
                show:true,
                url:'',
                isFullScreen:false,

                openFullScreen: function(){
                    if(this.isFullScreen){
                        this.isFullScreen = false;
                        if (document.exitFullscreen) {
                            document.exitFullscreen();
                        } else if (document.webkitExitFullscreen) { /* Safari */
                            document.webkitExitFullscreen();
                        } else if (document.msExitFullscreen) { /* IE11 */
                            document.msExitFullscreen();
                        }
                    }else{
                        this.isFullScreen = true;
                        if (document.documentElement.requestFullscreen) {
                            document.documentElement.requestFullscreen();
                        } else if (document.documentElement.webkitRequestFullscreen) { /* Safari */
                            document.documentElement.webkitRequestFullscreen();
                        } else if (document.documentElement.msRequestFullscreen) { /* IE11 */
                            document.documentElement.msRequestFullscreen();
                        }
                    }
                },

                closeFullScreen: function(){

                    this.open = false;
                    if(this.isFullScreen){

                        this.isFullScreen = false;

                        if (document.exitFullscreen) {
                            document.exitFullscreen();
                        } else if (document.webkitExitFullscreen) { /* Safari */
                            document.webkitExitFullscreen();
                        } else if (document.msExitFullscreen) { /* IE11 */
                            document.msExitFullscreen();
                        }
                    }
                },

                showViewer: function(){
                    if(!this.open){
                        document.getElementsByTagName('html')[0].style.overflow = 'auto';
                    }else{
                        document.getElementsByTagName('html')[0].style.overflow = 'hidden';
                    }
                },

                isResize: function(){

                    image = document.getElementById('imageViewer');

                    if(screen.width > screen.height){
                        image.classList.add('h-full');
                        image.classList.remove('w-full');
                    }else{
                        image.classList.add('w-full');
                        image.classList.remove('h-full');
                    }
                }
            }
        }
    </script>
@endpush

