@props(['entity', 'entityType'])

<!-- Delete Button -->
<button type="button" data-bs-toggle="modal" 
    data-bs-target="#delete_modal_{{ $entityType . $entity->id }}" 
    class="btn btn-danger delete_button">
        delete
</button>