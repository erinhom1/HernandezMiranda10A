<div style="background-image: url('{{ asset('img/background.jpg') }}'); background-size: 100% 100%; background-position: center;" class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
    <x-guest-layout>
        <x-authentication-card>
            <x-slot name="logo">
            </x-slot>

            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div>
                    <x-label for="Matricula" value="{{ __('Matricula') }}" />
                    <x-input id="Matricula" class="block mt-1 w-full" type="number" name="Matricula" :value="old('Matricula')" required autofocus autocomplete="Matricula" />
                </div>

                <div>
                    <x-label for="name" value="{{ __('Nombre') }}" />
                    <x-input id="Nombre" class="block mt-1 w-full" type="text" name="Nombre" :value="old('Nombre')" required autofocus autocomplete="Nombre" />
                </div>

                <div class="mt-4">
                    <x-label for="Apellido paterno" value="{{ __('Apellido paterno') }}" />
                    <x-input id="Primer_apellido" class="block mt-1 w-full" type="text" name="Primer_apellido" :value="old('Primer_apellido')" required />
                </div>

                <div class="mt-4">
                    <x-label for="Segundo_apellido" value="{{ __('Apellido materno') }}" />
                    <x-input id="Segundo_apellido" class="block mt-1 w-full" type="text" name="Segundo_apellido" :value="old('Segundo_apellido')" required />
                </div>

                <div class="mt-4">
                    <x-label for="Turno" value="{{ __('Turno') }}" />
                    <select id="Turno" class="block mt-1 w-full" name="Turno" required>
                    <option value="false">Selecciona un turno</option> <!-- Default option -->
                    <option value="Vespertino">Vespertino</option>
                    <option value="Matutino">Matutino</option>
                </div>

                <div class="mt-4">
                    <x-label for="Discapacidad" class="block mb-2" value="{{ __('Discapacidad') }}" />
                        <x-input id="Discapacidad" class="mt-1" type="checkbox" name="Discapacidad" :value="old('Discapacidad', 'NO')" />
                        <span class="ml-2">{{ __('Discapacidad') }}</span>
                </div>

                <div class="mt-4">
                    <x-label for="email" value="{{ __('Correo electronico') }}" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
                </div>

                <div class="mt-4">
                    <x-label for="Carrera" value="{{ __('Carrera') }}" />
                    <select id="Carrera" class="block mt-1 w-full" name="Carrera" required>
                    <option value="false">Selecciona una carrera</option> <!-- Default option -->
                    <option value="1">Tecnologia Ambiental</option>
                    <option value="2">Energias Renovables</option>
                    <option value="3">Manufactura Aeronautica</option>
                    <option value="4">Mecatronica</option>
                    <option value="5">Entornos Virtuales y Negocios Digitales</option>
                    <option value="6">Desarrollo y Gestion de Software</option>
                    <option value="7">Redes Inteligentes y Ciberseguridad</option>
                    <option value="8">Procesos y Operaciones Industriales</option>
                    <option value="9">Electromecanica Industrial</option>
                    <option value="10">Logistica Comercial Global</option>
                    <option value="11">Contaduria</option>
                    <option value="12">Gestion de Redes Logisticas</option>
                    <option value="13">Innovacion de Negocios y Mercadotecnia</option>
                    </select>
                </div>

                <div class="mt-4">
                    <x-label for="automovil.Marca" value="{{ __('Marca del automóvil') }}" />
                    <select id="Marca" name="automovil[Marca]" class="block mt-1 w-full" required>
                        <option value="" disabled selected>{{ __('Selecciona una marca') }}</option>
                        <option value="AUD89" @if(old('automovil.Marca') === 'AUD89') selected @endif>AUDI</option>
                        <option value="BMW74" @if(old('automovil.Marca') === 'BMW74') selected @endif>BMW</option>
                        <option value="CHE87" @if(old('automovil.Marca') === 'CHE87') selected @endif>CHEVROLET</option>
                        <option value="FIA47" @if(old('automovil.Marca') === 'FIA47') selected @endif>FIAT</option>
                        <option value="FOR36" @if(old('automovil.Marca') === 'FOR36') selected @endif>FORD</option>
                        <option value="HON14" @if(old('automovil.Marca') === 'HON14') selected @endif>HONDA</option>
                        <option value="HYU25" @if(old('automovil.Marca') === 'HYU25') selected @endif>HYUNDAI</option>
                        <option value="INF84" @if(old('automovil.Marca') === 'INF84') selected @endif>INFINITI</option>
                        <option value="JEE25" @if(old('automovil.Marca') === 'JEE25') selected @endif>JEEP</option>
                        <option value="KIA71" @if(old('automovil.Marca') === 'KIA71') selected @endif>KIA</option>
                        <option value="LEX95" @if(old('automovil.Marca') === 'LEX95') selected @endif>LEXUS</option>
                        <option value="MAZ27" @if(old('automovil.Marca') === 'MAZ27') selected @endif>MAZDA</option>
                        <option value="MER19" @if(old('automovil.Marca') === 'MER19') selected @endif>MERCEDES</option>
                        <option value="MIN36" @if(old('automovil.Marca') === 'MIN36') selected @endif>MINI</option>
                        <option value="MIT28" @if(old('automovil.Marca') === 'MIT28') selected @endif>MITSUBISHI</option>
                        <option value="NIS99" @if(old('automovil.Marca') === 'NIS99') selected @endif>NISSAN</option>
                        <option value="PEU41" @if(old('automovil.Marca') === 'PEU41') selected @endif>PEUGEOT</option>
                        <option value="REN25" @if(old('automovil.Marca') === 'REN25') selected @endif>RENAULT</option>
                        <option value="SEA74" @if(old('automovil.Marca') === 'SEA74') selected @endif>SEAT</option>
                        <option value="SUB33" @if(old('automovil.Marca') === 'SUB33') selected @endif>SUBARU</option>
                        <option value="SUZ14" @if(old('automovil.Marca') === 'SUZ14') selected @endif>SUZUKI</option>
                        <option value="TOY36" @if(old('automovil.Marca') === 'TOY36') selected @endif>TOYOTA</option>
                        <option value="VOK85" @if(old('automovil.Marca') === 'VOK85') selected @endif>VOLKSWAGEN</option>
                        <option value="VOL22" @if(old('automovil.Marca') === 'VOL22') selected @endif>VOLVO</option>
                    </select>
                </div>

                <div class="mt-4">
                    <x-label for="automovil.Modelo" value="{{ __('Modelo del automóvil') }}" />
                    <x-input id="Modelo" class="block mt-1 w-full" type="text" name="automovil[Modelo]" :value="old('automovil.Modelo')" required />
                </div>

                <div class="mt-4">
                    <x-label for="automovil.NumSerie" value="{{ __('Número de Serie') }}" />
                    <x-input id="NumSerie" class="block mt-1 w-full" type="text" name="automovil[NumSerie]" :value="old('automovil.NumSerie')" required />
                </div>

                <div class="mt-4">
                    <x-label for="automovil.NumPlaca" value="{{ __('Número de Placa') }}" />
                    <x-input id="NumPlaca" class="block mt-1 w-full" type="text" name="automovil[NumPlaca]" :value="old('automovil.NumPlaca')" required />
                </div>

                <div class="mt-4">
                    <x-label for="automovil.Temporada" value="{{ __('Año') }}" />
                    <select id="Temporada" name="automovil[Temporada]" class="block mt-1 w-full" required>
                        <option value="" disabled selected>{{ __('Selecciona un año') }}</option>
                        @php
                            $currentYear = date('Y');
                        @endphp
                        @for ($year = $currentYear - 50; $year <= $currentYear; $year++)
                            <option value="{{ $year }}" @if(old('automovil.Temporada') == $year) selected @endif>{{ $year }}</option>
                        @endfor
                    </select>
                </div>

                <div class="mt-4">
                    <x-label for="automovil.color" value="{{ __('Color del automóvil') }}" />
                    <x-input id="color" class="block mt-1 w-full" type="text" name="automovil[color]" :value="old('automovil.color')" required />
                </div>

                <div class="mt-4">
                    <x-label for="automovil.Estacionamiento" value="{{ __('Estacionamiento') }}" />
                    <select id="Estacionamiento" name="automovil[Estacionamiento]" class="block mt-1 w-full" required>
                        <option value="" disabled selected>{{ __('Selecciona un estacionamiento') }}</option>
                        <option value="1" @if(old('automovil.Estacionamiento') === '1') selected @endif>1</option>
                        <option value="2" @if(old('automovil.Estacionamiento') === '2') selected @endif>2</option>
                        <option value="3" @if(old('automovil.Estacionamiento') === '3') selected @endif>3</option>
                        <option value="4" @if(old('automovil.Estacionamiento') === '4') selected @endif>4</option>
                        <option value="5" @if(old('automovil.Estacionamiento') === '5') selected @endif>5</option>
                    </select>
                </div>

                <div class="mt-4">
                    <x-label for="password" value="{{ __('Password') }}" />
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <x-label for="terms">
                            <div class="flex items-center">
                                <x-checkbox name="terms" id="terms" required />

                                <div class="ml-2">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-label>
                    </div>
                @endif

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                        {{ __('Ya estas registrado?') }}
                    </a>

                    <x-button class="ml-4">
                        {{ __('Registrarse') }}
                    </x-button>
                </div>
            </form>
        </x-authentication-card>
    </x-guest-layout>
</div>
