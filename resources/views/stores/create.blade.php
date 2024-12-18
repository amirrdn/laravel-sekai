<x-app-layout>
  <div class="max-w-2xl mx-auto bg-white shadow-md rounded p-6">
    <h1 class="text-2xl font-bold mb-4 text-gray-700">Add Store</h1>
    <form action="/stores" method="POST" class="space-y-4">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div>
          <label for="type_id" class="block text-sm font-medium text-gray-700">Member</label>
          <select id="user_id" name="user_id"
              class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
              <option value="">Select Member</option>
              @foreach ($users as $v)
                  <option value="{{ $v->id }}">{{ $v->name }}</option>
              @endforeach
          </select>
      </div>
        <div>
            <label for="store_name" class="block text-sm font-medium text-gray-700">Store Name</label>
            <input type="text" id="store_name" name="store_name" placeholder="Enter store name"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
        </div>
        <div>
            <label for="type_id" class="block text-sm font-medium text-gray-700">Store Type</label>
            <select id="type_id" name="type_id"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                <option value="">Select store type</option>
                @foreach ($storeTypes as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="id_card_number" class="block text-sm font-medium text-gray-700">ID Card Number</label>
            <input type="text" id="id_card_number" name="id_card_number" placeholder="Enter ID card number"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
        </div>
        <div>
            <label for="owner" class="block text-sm font-medium text-gray-700">Owner</label>
            <input type="text" id="owner" name="owner" placeholder="Enter owner name"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
        </div>
        <div>
            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
            <textarea id="address" name="address" placeholder="Enter address"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
        </div>
        <div>
            <label for="postal_code" class="block text-sm font-medium text-gray-700">Postal Code</label>
            <input type="text" id="postal_code" name="postal_code" placeholder="Enter postal code"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
        </div>
        <div>
            <label for="location_store" class="block text-sm font-medium text-gray-700">Location (Google Maps Link)</label>
            <input type="text" id="location_store" name="location_store" placeholder="Enter Google Maps link"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
        </div>

        <div>
            <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
            <input type="text" id="phone_number" name="phone_number" placeholder="Enter phone number"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
        </div>
        <div>
            <label for="city" class="block text-sm font-medium text-gray-700">City</label>
            <input type="text" id="city" name="city" placeholder="Enter city"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
        </div>
        <div>
            <button type="submit"
                class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Submit
            </button>
        </div>
    </form>
</div>

</x-app-layout>
