<form id="generateForm" class="space-y-6">
    @csrf
    <div>
        <label for="bidangBisnis" class="block text-sm font-medium text-gray-700">Business Field</label>
        <input type="text" id="bidangBisnis" name="bidangBisnis" required
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50"
            placeholder="e.g., Technology, Food & Beverage, E-commerce and Fashion">
    </div>

    <div>
        <label for="targetPasar" class="block text-sm font-medium text-gray-700">Target Market</label>
        <input type="text" id="targetPasar" name="targetPasar" required
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50"
            placeholder="e.g., Millennials and Gen Z, Students, Families">
    </div>

    <button type="submit"
        class="w-full bg-primary text-white px-6 py-3 rounded-lg font-semibold hover:bg-secondary transition-colors duration-200">
        Generate Insight
    </button>
</form>
