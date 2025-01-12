  <!-- Modal Structure -->
  <div class="modal fade" id="CreatePostCategoryModal" data-bs-backdrop="static" data-bs-keyboard="false"
  tabindex="-1" aria-labelledby="CreatePostCategoryModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="CreatePostCategoryModalLabel">Catégorie de Livre</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <form id="postCategoryForm" action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        @method('POST')
        <div class="modal-body">
          <!-- Nom de la Catégorie -->
          <div class="mb-3">
            <label for="name" class="form-label">Nom de la Catégorie</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nom de la catégorie"
              required>
          </div>

          <!-- Description de la Catégorie -->
          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3"
              placeholder="Description de la catégorie (facultatif)"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
      </form>
    </div>
  </div>
</div>
</script>