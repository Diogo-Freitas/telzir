<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Telzir</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<section class="text-gray-600 body-font overflow-hidden">
    <div class="container px-5 py-16 mx-auto">
        <div class="flex flex-col text-center w-full">
            <h1 class="text-6xl font-medium title-font mb-8 text-indigo-600 "><a href="{{ route('home') }}">Telzir</a></h1>
            <p class="lg:w-2/3 mx-auto my-5 leading-relaxed text-base text-gray-600">Com o novo produto FaleMais da Telzir o cliente adquire um plano e pode falar de graça até um determinado tempo (em minutos) e só paga os minutos excedentes.</p>
            <p class="lg:w-2/3 mx-auto my-5 leading-relaxed text-base text-gray-600">Simule abaixo nossos planos disponíveis e veja qual mais se adequa a sua necessidade.</p>
        </div>
        <form action="{{ route('home') }}" method="GET">
            <div class="container py-10 mx-auto">
                <div class="flex flex-wrap -m-4">
                    <div class="p-4 sm:w-1/4 w-full">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Origem</label>
                        <select name="source" class="rounded-lg border-2 border-indigo-500 block w-full focus:border-indigo-500">
                            <option value="">DDD</option>
                            @foreach ($ddds as $ddd)
                                <option @selected(old('source', request('source')) == $ddd->id) value="{{ $ddd->id }}">{{ $ddd->code }}</option>
                            @endforeach
                        </select>
                        <p class="text-red-500 text-xs italic">{{ $errors->first('source') }}</p>
                    </div>
                    <div class="p-4 sm:w-1/4 w-full">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Destino</label>
                        <select name="destination" class="rounded-lg border-2 border-indigo-500 block w-full focus:border-indigo-500">
                            <option value="">DDD</option>
                            @foreach ($ddds as $ddd)
                                <option @selected(old('destination', request('destination')) == $ddd->id) value="{{ $ddd->id }}">{{ $ddd->code }}</option>
                            @endforeach
                        </select>
                        <p class="text-red-500 text-xs italic">{{ $errors->first('destination') }}</p>
                    </div>
                    <div class="p-4 sm:w-1/4 w-full">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Minutos</label>
                        <input name="time" value="{{ old('time', request('time')) }}" class="rounded-lg border-2 border-indigo-500 block w-full focus:border-indigo-500" type="number" placeholder="0">
                        <p class="text-red-500 text-xs italic">{{ $errors->first('time') }}</p>
                    </div>
                    <div class="p-4 sm:w-1/4 w-full">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Plano</label>
                        <select name="plan" class="rounded-lg border-2 border-indigo-500 block w-full focus:border-indigo-500">
                            <option value="">Selecione</option>
                            @foreach ($plans as $plan)
                                <option @selected(old('plan', request('plan')) == $plan->id) value="{{ $plan->id }}">{{ $plan->name }}</option>
                            @endforeach
                        </select>
                        <p class="text-red-500 text-xs italic">{{ $errors->first('plan') }}</p>
                    </div>
                </div>
                <div class="flex justify-center my-16">
                    <button class="px-8 py-4 tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-80">
                        CALCULAR VALOR DA LIGAÇÃO
                    </button>
                </div>
            </div>
        </form>
        @if ($withPlan || $withoutPlan)
            <div class="flex flex-wrap -m-4">
                <div class="p-4 xl:w-1/2 md:w-1/2 w-full">
                    <div class="h-full rounded-lg border-2 border-indigo-500 flex flex-col relative overflow-hidden">
                        <h2 class="text-white py-2 px-3 tracking-widest text-xl bg-indigo-500">Com {{ $selectedPlan->name }}</h2>
                        <h1 class="text-5xl text-gray-900 leading-none flex items-center px-5 py-8">
                            <span>$ {{ number_format($withPlan, 2, ',', '.') }}</span>
                        </h1>
                    </div>
                </div>
                <div class="p-4 xl:w-1/2 md:w-1/2 w-full">
                    <div class="h-full rounded-lg border-2 border-gray-400 flex flex-col relative overflow-hidden">
                        <h2 class="text-white py-2 px-3 tracking-widest text-xl bg-gray-400">Sem FaleMais</h2>
                        <h1 class="text-5xl text-gray-900 leading-none flex items-center px-5 py-8">
                            <span>$ {{ number_format($withoutPlan, 2, ',', '.') }}</span>
                        </h1>
                    </div>
                </div>
            </div>
        @elseif($selectedPlan)
            <div class="flex flex-col text-center w-full">
                <p class="lg:w-2/3 mx-auto leading-relaxed font-bold text-lg text-red-500">Infelizmente ainda não temos disponibilidade para o DDDs de Origem e Destino selecionados.</p>
            </div>
        @endif
    </div>
</section>
</body>

</html>
