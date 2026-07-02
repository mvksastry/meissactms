<!-- File input -->
  <input type="file"
           wire:model="coafiles.{{ $row->temp_product_id }}"
           class="form-control" />
    @error("coafiles.{{ $row->temp_product_id }}.coa")
        <div class="text-red-600 text-xs">{{ $message }}</div>
    @enderror