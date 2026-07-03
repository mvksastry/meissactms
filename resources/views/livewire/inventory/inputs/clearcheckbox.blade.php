<!-- File input -->
  <input type="checkbox"
           wire:model="cleared" value="{{ $row->temp_product_id }}"
           class="form-check" />
    @error("cleared.{{ $row->temp_product_id }}")
        <div class="text-red-600 text-xs">{{ $message }}</div>
    @enderror