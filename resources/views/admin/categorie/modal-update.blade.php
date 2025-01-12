<!-- Modal Structure pour la Mise à Jour -->
<div class="modal fade" id="UpdatePostCategoryModal" data-bs-backdrop="static" data-bs-keyboard="false"
  tabindex="-1" aria-labelledby="UpdatePostCategoryModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="UpdatePostCategoryModalLabel">Modifier une Catégorie</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <form id="updateCategoryForm" action="{{ route('admin.categories.update', 1) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <!-- Nom de la Catégorie -->
          <div class="mb-3">
            <label for="name" class="form-label">Nom de la Catégorie</label>
            <input type="text" class="form-control" id="update_name" name="name" placeholder="Nom de la catégorie"
              required>
          </div>

          <!-- Description de la Catégorie -->
          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="update_description" name="description" rows="3"
              placeholder="Description de la catégorie (facultatif)"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const updateModal = document.getElementById('UpdatePostCategoryModal');
    const updateCategoryForm = document.getElementById('updateCategoryForm');

    // Quand le modal de mise à jour est ouvert
    updateModal.addEventListener('show.bs.modal', function (event) {
      const button = event.relatedTarget; // Bouton qui déclenche l'ouverture
      const action = button.getAttribute('data-bs-action') || '';
      const name = button.getAttribute('data-bs-name') || '';
      const description = button.getAttribute('data-bs-description') || '';

      // Mise à jour de l'action du formulaire
      updateCategoryForm.action = action;

      // Remplir les champs du formulaire avec les valeurs existantes
      document.getElementById('update_name').value = name;
      document.getElementById('update_description').value = description;
    });

    // Quand le modal de création est fermé, réinitialiser les champs
    const createModal = document.getElementById('CreatePostCategoryModal');
    createModal.addEventListener('hidden.bs.modal', function () {
      document.getElementById('name').value = '';
      document.getElementById('description').value = '';
    });
  });
</script>
