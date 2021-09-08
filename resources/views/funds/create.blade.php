<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Fund') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if (session()->has('alert'))
                    <div class="p-3 mb-5 bg-green-600 text-white rounded-md">
                        {{ session('alert.text') }}
                    </div>
                    @endif

                    <form class="w-full" method="POST" action="{{ route('funds.store') }}">
                        @csrf
                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                              <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="name">
                                Name
                              </label>
                            </div>
                            <div class="md:w-2/3">
                                <input class="bg-gray-100 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white" id="name" name="name" type="text" autofocus autocomplete="off">
                            </div>
                        </div>

                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                              <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                Type
                              </label>
                            </div>
                            <div class="md:w-2/3">
                                <select name="category" id="category" class="bg-gray-100 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white">
                                    <option value="savings">Savings Account</option>
                                    <option value="high_interest_savings">High-interest savings account</option>
                                    <option value="physical_wallet">Physical Wallet</option>
                                    <option value="e_wallet">E-wallet</option>
                                    <option value="investment">Investment</option>
                                </select>
                            </div>
                        </div>

                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                              <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="initial_balance">
                                Initial Balance
                              </label>
                            </div>
                            <div class="md:w-2/3">
                                <input class="bg-gray-100 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white" id="initial_balance" name="initial_balance" type="text" autocomplete="off">
                            </div>
                        </div>

                        <div class="md:flex md:items-center">
                            <div class="md:w-1/3"></div>
                            <div class="md:w-2/3">
                                <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded float-right" type="submit">
                                Create Fund
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
