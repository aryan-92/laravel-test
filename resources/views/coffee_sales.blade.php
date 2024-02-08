<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New ☕️ Sales') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @todo
                    <form method="POST" action="{{ route('add.sales') }}" class="w-full max-w-lg">
                        @csrf

                        <div class="flex flex-wrap -mx-3 mb-2">
                            <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="quantity">
                                    Quantity:
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                     type="text" placeholder="Quantity" name="quantity" id="quantity">
                            </div>
                            <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="ucost">
                                    Unit Cost:
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                     type="text" placeholder="Unit Cost" name="ucost" id="ucost">
                            </div>
                            <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-quantity">
                                    Selling Price Cost:
                                </label>
                                <p>&euro;<span id="sellPriceContianer"> </span></p>
                                <input type="hidden" name="sellPrice" value="" id="sellPrice">
                            </div>
                            <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">

                                <input type="hidden" name="productName" value="Gold coffee">
                                <button type="submit"
                                    class="shadow dark:bg-gray-800 focus:shadow-outline focus:outline-none font-bold py-2 px-4 rounded"
                                    type="button">
                                    Record Sale
                                </button>


                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative overflow-x-auto">


                    <table class="w-full boder-light border-separate border border-slate-400">
                        <thead>
                            <tr class="boder-light">
                                <th class="border border-slate-300">Sl.No</th>
                                <th class="border border-slate-300">quantity</th>
                                <th class="border border-slate-300">unit cost</th>
                                <th class="border border-slate-300">selling price</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($collection as $item)
                                <tr class="text-center">
                                    <td class="border border-slate-300">{{ $loop->iteration }}</td>
                                    <td class="border border-slate-300">{{ $item->product_qty }}</td>
                                    <td class="border border-slate-300">{{ $item->product_unit_cost }}</td>
                                    <td class="border border-slate-300">{{ $item->product_selling_price }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="border border-slate-300 text-center" colspan="3">No Data Available
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>




@section('js')
<script>
$(document).ready(function(){
    //alert('ff');

        $('#ucost').on('blur', function() {

            let ucost = $(this).val();
            let quantity = $('#quantity').val();
            //alert(quantity);

            let cost = quantity * ucost;
            let shippingCost = 10;
            let sellPrice = parseFloat(cost / (1 - 0.25)) + shippingCost;
            //alert(sellPrice);
            var roundedNumber = Math.ceil(sellPrice * 100) / 100;

            //alert(roundedNumber);

            $('#sellPriceContianer').text(roundedNumber);
            $('#sellPrice').val(roundedNumber);
        });
    });
    </script>
@endsection
</x-app-layout>
