<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Transaction') }}
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

                    <form class="w-full" method="POST" action="{{ route('transactions.store') }}">
                        @csrf
                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                              <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="transaction_datetime">
                                Date
                              </label>
                            </div>
                            <div class="md:w-2/3">
                                <input class="bg-gray-100 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white" id="transaction_datetime" name="transaction_datetime" type="text" autofocus autocomplete="off">
                            </div>
                        </div>

                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                              <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="transaction_type">
                                Type
                              </label>
                            </div>
                            <div class="md:w-2/3">
                                <select name="transaction_type" id="transaction_type" class="bg-gray-100 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white">
                                   <option value="expense">Expense</option>
                                   <option value="fund_transfer">Fund Transfer</option>
                                   <option value="income">Income</option>
                                   <option value="investment">Investment</option>
                                   <option value="donation">Donation</option>
                                </select>
                            </div>
                        </div>

                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                              <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="user_category_id">
                                Category
                              </label>
                            </div>
                            <div class="md:w-2/3">
                                <select name="user_category_id" id="user_category_id" class="bg-gray-100 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white">
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                              <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="summary">
                                Summary
                              </label>
                            </div>
                            <div class="md:w-2/3">
                                <input class="bg-gray-100 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white" id="summary" name="summary" type="text" autofocus autocomplete="off">
                            </div>
                        </div>


                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                              <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="source_user_fund_id">
                                Source Fund
                              </label>
                            </div>
                            <div class="md:w-2/3">
                                <select name="source_user_fund_id" id="source_user_fund_id" class="bg-gray-100 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white">
                                    @foreach ($funds as $fund)
                                    <option value="{{ $fund->id }}">{{ $fund->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                              <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="destination_user_fund_id">
                                Destination Fund
                              </label>
                            </div>
                            <div class="md:w-2/3">
                                <select name="destination_user_fund_id" id="destination_user_fund_id" class="bg-gray-100 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white">
                                    <option value="">N/A</option>
                                    @foreach ($funds as $fund)
                                    <option value="{{ $fund->id }}">{{ $fund->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                              <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="amount">
                                Amount
                              </label>
                            </div>
                            <div class="md:w-2/3">
                                <input class="bg-gray-100 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white" id="amount" name="amount" type="text" autocomplete="off">
                            </div>
                        </div>

                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                              <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="cashback">
                                Cashback
                              </label>
                            </div>
                            <div class="md:w-2/3">
                                <input class="bg-gray-100 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white" id="cashback" name="cashback" type="text" autocomplete="off">
                            </div>
                        </div>

                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                              <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="transfer_fee">
                                Transfer Fee
                              </label>
                            </div>
                            <div class="md:w-2/3">
                                <input class="bg-gray-100 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white" id="transfer_fee" name="transfer_fee" type="text" autocomplete="off">
                            </div>
                        </div>

                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                              <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="notes">
                                Notes
                              </label>
                            </div>
                            <div class="md:w-2/3">
                                <input class="bg-gray-100 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white" id="notes" name="notes" type="text" autocomplete="off">
                            </div>
                        </div>

                        <div class="md:flex md:items-center">
                            <div class="md:w-1/3"></div>
                            <div class="md:w-2/3">
                                <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded float-right" type="submit">
                                Create Transaction
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
