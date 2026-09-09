@props(['entity', 'entityType'])

<!-- Delete Button -->
<button type="button" data-bs-toggle="modal" 
    data-bs-target="#delete_modal_{{ $entityType . $entity->id }}" 
    class="btn btn-outline-danger delete_button"
    title="delete"
    aria-label="delete button">
        <i class="bi bi-trash"></i>
</button>