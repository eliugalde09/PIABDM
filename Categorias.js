let categories = [
    { id: 1, name: '2D', description: 'Categoría enfocada en 2D', date: '2024-09-13', user: 'Emily Grace' },
    { id: 2, name: '3D', description: 'Categoría enfocada en 3D', date: '2024-09-13', user: 'Emily Grace' },
    { id: 3, name: 'Programación en PHP', description: 'Categoría enfocada en programación PHP', date: '2024-09-13', user: 'Emily Grace' }
];

const categoryForm = document.getElementById('categoryForm');
const categoryNameInput = document.getElementById('categoryName');
const descriptionInput = document.getElementById('description');
const categoryTable = document.getElementById('categoryTable');
let editingCategoryId = null;

function updateCategoryTable() {
    categoryTable.innerHTML = '';
    categories.forEach(category => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <th scope="row">${category.id}</th>
            <td>${category.name}</td>
            <td>${category.description}</td>
            <td>${category.date}</td>
            <td>${category.user}</td>
            <td><a href="javascript:void(0)" onclick="editCategory(${category.id})"><i class='ico-edit bx bxs-edit-alt'></i></a></td>
            <td><a href="javascript:void(0)" onclick="deleteCategory(${category.id})"><i class='ico-delete bx bx-x'></i></a></td>
        `;
        categoryTable.appendChild(row);
    });
}

function editCategory(id) {
    const category = categories.find(c => c.id === id);
    categoryNameInput.value = category.name;
    descriptionInput.value = category.description;
    categoryForm.querySelector('button').textContent = 'Actualizar categoría';
    editingCategoryId = id;
}

function deleteCategory(id) {
    const confirmation = confirm('¿Seguro que desea eliminar esta categoría?');
    if (confirmation) {
        categories = categories.filter(c => c.id !== id);
        alert('Categoría eliminada correctamente');
        updateCategoryTable();
    }
}

categoryForm.addEventListener('submit', function(event) {
    event.preventDefault();
    
    const name = categoryNameInput.value;
    const description = descriptionInput.value;
    
    if (editingCategoryId === null) {
        const newCategory = {
            id: categories.length + 1,
            name: name,
            description: description,
            date: new Date().toISOString().split('T')[0],
            user: 'Admin'
        };
        categories.push(newCategory);
        alert('Categoría agregada correctamente');
    } else {
        const categoryIndex = categories.findIndex(c => c.id === editingCategoryId);
        categories[categoryIndex].name = name;
        categories[categoryIndex].description = description;
        alert('La categoría fue actualizada correctamente');
        editingCategoryId = null;
    }

    categoryForm.reset();
    categoryForm.querySelector('button').textContent = 'Agregar categoría';
    updateCategoryTable();
});

// Inicializar la tabla con las categorías existentes
updateCategoryTable();
