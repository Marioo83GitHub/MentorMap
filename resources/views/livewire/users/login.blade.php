<div class="login-main shadow-2xl border border-gray-200 dark:border-gray-700 relative z-10 bg-white dark:bg-gray-800">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    @vite(['resources/css/Login/style.css', 'resources/css/Login/script.js', 'resources/css/app.css'])
    <div class="login-info bg-white dark:bg-gray-800">
        <div class="hidden md:flex"
            style="height:100%; display:flex;flex-direction:column;justify-content:center;align-items:center;text-align:center;">
            <div class="bg-gradient-to-br dark:from-gray-700 dark:to-gray-800 from-[ #f6f6f6] via-gray-100 dark:via-none to-[#c2fdc3] backdrop-blur-sm"
                style="border-radius:20px;width:95%;height:95%;display:flex;flex-direction:column;justify-content:center;align-items:center;padding:40px 20px;">
                <div id="info-content"
                    style="display:flex;flex-direction:column;align-items:center;justify-content:center;">
                    <img id="info-img" src="{{asset('Logos/colored/LogoTextHorizontal_nobg.png')}}" alt="Login Info"
                        class="dark:hidden"
                        style="width:200px;height:auto;margin-bottom:32px;">
                    <img id="info-img-dark" src="{{asset('Logos/white/LogoTextHorizontal.png')}}" alt="Login Info"
                        class="hidden dark:block"
                        style="width:200px;height:auto;margin-bottom:32px;">
                    <h2 id="info-title"
                        class="text-black dark:text-white"
                        style="font-size:1.6rem;font-weight:700;margin-bottom:12px;text-align:center;">
                        Plataforma para conectar con mentores expertos</h2>
                    <p id="info-desc"
                        class="text-black dark:text-gray-300"
                        style="font-size:1rem;opacity:0.8;margin-bottom:8px;text-align:center;">Accede a
                        sesiones en línea y mejora tu aprendizaje con la guía de profesionales</p>
                </div>
                    <div style="margin-top:24px;">
                        <span class="indicator bg-black dark:bg-white" data-index="0"
                            style="display:inline-block;width:8px;height:8px;border-radius:50%;margin:0 2px;opacity:0.5;cursor:pointer;"></span>
                        <span class="indicator bg-black dark:bg-white" data-index="1"
                            style="display:inline-block;width:8px;height:8px;border-radius:50%;margin:0 2px;opacity:0.5;cursor:pointer;"></span>
                        <span class="indicator bg-black dark:bg-white" data-index="2"
                            style="display:inline-block;width:8px;height:8px;border-radius:50%;margin:0 2px;opacity:1;cursor:pointer;"></span>
                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const indicators = document.querySelectorAll('.indicator');
                            const infoImg = document.getElementById('info-img');
                            const infoTitle = document.getElementById('info-title');
                            const infoDesc = document.getElementById('info-desc');
                            const infoData = [
                                {
                                    img: '{{asset('Logos/colored/LogoTextHorizontal_nobg.png')}}',
                                    imgDark: '{{asset('Logos/white/LogoTextHorizontal.png')}}',
                                    title: 'Plataforma para conectar con mentores expertos',
                                    desc: 'Accede a sesiones en línea y mejora tu aprendizaje con la guía de profesionales.'
                                },
                                {
                                    img: '{{asset('Logos/colored/LogoTextHorizontal_nobg.png')}}',
                                    imgDark: '{{asset('Logos/white/LogoTextHorizontal.png')}}',
                                    title: 'Encuentra el mentor ideal para cada materia',
                                    desc: 'Explora perfiles, revisa valoraciones y elige el mentor que mejor se adapte a tus necesidades.'
                                },
                                {
                                    img: '{{asset('Logos/colored/LogoTextHorizontal_nobg.png')}}',
                                    imgDark: '{{asset('Logos/white/LogoTextHorizontal.png')}}',
                                    title: 'Aprende y crece desde cualquier lugar',
                                    desc: 'Conéctate en línea, resuelve tus dudas y alcanza tus objetivos académicos con MentorMap.'
                                }
                            ];
                            let currentIdx = 0;
                            const infoImgDark = document.getElementById('info-img-dark');
                            
                            function setContent(idx) {
                                indicators.forEach((i, j) => {
                                    i.style.opacity = (j === idx) ? '1' : '0.5';
                                });
                                
                                // Actualizar imágenes para ambos modos
                                infoImg.src = infoData[idx].img;
                                if (infoImgDark) {
                                    infoImgDark.src = infoData[idx].imgDark;
                                }
                                
                                infoTitle.textContent = infoData[idx].title;
                                infoDesc.textContent = infoData[idx].desc;
                                currentIdx = idx;
                            }
                            indicators.forEach((el, idx) => {
                                el.addEventListener('click', function() {
                                    setContent(idx);
                                });
                            });
                            // Cambio automático cada 3 segundos
                            setInterval(function() {
                                let nextIdx = (currentIdx + 1) % infoData.length;
                                setContent(nextIdx);
                            }, 8000);
                        });
                    </script>
            </div>
        </div>
    </div>
    <div class="login-form-col bg-white dark:bg-gray-800">
        <div class="container">
            <div class="forms">
                <div class="form login bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700">
                    <span class="title text-gray-900 dark:text-white">Iniciar sesión</span>
                    <form wire:submit="login">
                        <div class="input-field">
                            <input wire:model="email" type="text" placeholder="Ingresa tu correo" required 
                                   class="bg-white dark:bg-gray-700 text-gray-900 dark:text-white border-gray-300 dark:border-gray-600 placeholder-gray-500 dark:placeholder-gray-400" />
                            <i class="uil uil-envelope icon text-gray-600 dark:text-gray-400"></i>
                        </div>
                        <div class="input-field">
                            <input wire:model="password" type="password" class="password bg-white dark:bg-gray-700 text-gray-900 dark:text-white border-gray-300 dark:border-gray-600 placeholder-gray-500 dark:placeholder-gray-400" placeholder="Ingresa tu contraseña" required />
                            <i class="uil uil-lock icon text-gray-600 dark:text-gray-400"></i>
                            <i class="uil uil-eye-slash showHidePw text-gray-600 dark:text-gray-400"></i>
                        </div>

                        <div class="checkbox-text">
                            <div class="checkbox-content">
                                <input type="checkbox" id="logCheck" class="accent-mmgreen" />
                                <label for="logCheck" class="text text-gray-700 dark:text-gray-300">Recuérdame</label>
                            </div>

                            <a href="#" class="text text-mmgreen dark:text-green-400 hover:text-green-600 dark:hover:text-green-300">¿Olvidaste tu contraseña?</a>
                        </div>

                        <div class="input-field button">
                            <input type="submit" value="Iniciar sesión" class="bg-mmgreen hover:bg-green-600 dark:bg-green-600 dark:hover:bg-green-700 text-white" />
                        </div>
                    </form>

                    <div class="login-signup">
                        <span class="text text-gray-700 dark:text-gray-300">¿Aun no estás registrado?
                            <a href="#" class="text signup-link text-mmgreen dark:text-green-400 hover:text-green-600 dark:hover:text-green-300">Regístrate ahora</a>
                        </span>
                    </div>
                </div>

                <!-- Registration Form -->
                <div class="form signup bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700">
                    <span class="title text-gray-900 dark:text-white">Registro</span>

                    <form wire:submit="formSignUp">
                        <div class="input-field">
                            <input wire:model="registerEmail" type="text" placeholder="Ingresa tu correo" required 
                                   class="bg-white dark:bg-gray-700 text-gray-900 dark:text-white border-gray-300 dark:border-gray-600 placeholder-gray-500 dark:placeholder-gray-400" />
                            <i class="uil uil-envelope icon text-gray-600 dark:text-gray-400"></i>
                        </div>
                        <div class="input-field">
                            <input wire:model="registerPassword" type="password" class="password bg-white dark:bg-gray-700 text-gray-900 dark:text-white border-gray-300 dark:border-gray-600 placeholder-gray-500 dark:placeholder-gray-400" placeholder="Crear una contraseña" required />
                            <i class="uil uil-lock icon text-gray-600 dark:text-gray-400"></i>
                        </div>
                        <div class="input-field">
                            <input wire:model="registerConfirmPassword" type="password" class="password bg-white dark:bg-gray-700 text-gray-900 dark:text-white border-gray-300 dark:border-gray-600 placeholder-gray-500 dark:placeholder-gray-400" placeholder="Confirmar la contraseña" required />
                            <i class="uil uil-lock icon text-gray-600 dark:text-gray-400"></i>
                            <i class="uil uil-eye-slash showHidePw text-gray-600 dark:text-gray-400"></i>
                        </div>

                        <div class="checkbox-text">
                            <div class="checkbox-content">
                                <input type="checkbox" id="termCon" class="accent-mmgreen" required/>
                                <label for="termCon" class="text text-gray-700 dark:text-gray-300">Acepto todos los términos y condiones</label>
                            </div>
                        </div>

                        <div class="input-field button">
                            <input type="submit" value="Registrarse" class="bg-mmgreen hover:bg-green-600 dark:bg-green-600 dark:hover:bg-green-700 text-white" />
                        </div>
                    </form>

                    <div class="login-signup">
                        <span class="text text-gray-700 dark:text-gray-300">¿Ya tiene una cuenta?
                            <a href="#" class="text login-link text-mmgreen dark:text-green-400 hover:text-green-600 dark:hover:text-green-300">Iniciar sesión</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
