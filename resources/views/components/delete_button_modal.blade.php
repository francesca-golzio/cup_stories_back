@props(['entity', 'entityType', 'tableName']) 

<!-- Modal -->
<div class="modal fade dark" id="delete_modal_{{ $entityType . $entity->id }}" tabindex="-1" aria-labelledby="delete_{{ $entityType }}_label{{ $entity->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="delete_{{ $entityType . $entity->id }}_label">
            Do you really want to delete this {{ $entityType }}?
        </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Caution:<br>once you delete this {{ $entityType }}, you wan't be able to recover it.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Abort</button>
        <form action="{{ route('admin.' . $tableName .'.destroy', $entity) }}" 
            method="POST" >
          @csrf
          @method('DELETE')
          <input type="submit" class="btn delete_forever_button" value="Delete forever">
        </form>
      </div>
    </div>
  </div>
</div>