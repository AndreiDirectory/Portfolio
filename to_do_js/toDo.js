


const form = document.querySelector('#task-form');
const toDoList = document.querySelector('.collection');
const clearList = document.querySelector('.clear-tasks');
const filter = document.querySelector('#filter');
const toDoInput = document.querySelector('#task');

loadEventListeners();

function loadEventListeners() {
  document.addEventListener('DOMContentLoaded', getToDo);
  form.addEventListener('submit', addToDo);
  toDoList.addEventListener('click', removeToDo);
  clearList.addEventListener('click', clearToDos);
  filter.addEventListener('keyup', filterToDos);
}



// Get To Do

function getToDo() {
  let tasks;
  if(localStorage.getItem('tasks') === null){
    tasks = [];
  } else {
    tasks = JSON.parse(localStorage.getItem('tasks'));
  }

  tasks.forEach(function(task){
    const li = document.createElement('li');
    // Add class
    li.className = 'collection-item';
    li.appendChild(document.createTextNode(task));

    const link = document.createElement('a');
    link.className = 'delete-item secondary-content';
    link.innerHTML = '<i class="fa fa-remove"></i>';
    li.appendChild(link);

    // Append li
    toDoList.appendChild(li);
  });
}





// Add To Do

function addToDo(e) {
  if(toDoInput.value === '') {
    alert('Add a task');
  }

  // Create li
  const li = document.createElement('li');
  li.className = 'collection-item';
  li.appendChild(document.createTextNode(toDoInput.value));
  const link = document.createElement('a');
  link.className = 'delete-item secondary-content';
  link.innerHTML = '<i class="fa fa-remove"></i>';
  li.appendChild(link);

  // Append li
  toDoList.appendChild(li);

  storeTaskInLocalStorage(toDoInput.value);

  // Clear
  toDoInput.value = '';
  e.preventDefault();
}



// Store To Do
function storeTaskInLocalStorage(task) {
  let tasks;
  if(localStorage.getItem('tasks') === null){
    tasks = [];
  } else {
    tasks = JSON.parse(localStorage.getItem('tasks'));
  }

  tasks.push(task);
  localStorage.setItem('tasks', JSON.stringify(tasks));
}



// Remove
function removeToDo(e) {
  if(e.target.parentElement.classList.contains('delete-item')) {
    if(confirm('Please confirm')) {
      e.target.parentElement.parentElement.remove();
      removeToDoFromLocalStorage(e.target.parentElement.parentElement);
    }
  }
}



// Remove fom local storage

function removeToDoFromLocalStorage(taskItem) {
  let tasks;
  if(localStorage.getItem('tasks') === null){
    tasks = [];
  } else {
    tasks = JSON.parse(localStorage.getItem('tasks'));
  }

  tasks.forEach(function(task, index){
    if(taskItem.textContent === task){
      tasks.splice(index, 1);
    }
  });
  localStorage.setItem('tasks', JSON.stringify(tasks));
}



// Clear

function clearToDos() {
  while(toDoList.firstChild) {
    toDoList.removeChild(toDoList.firstChild);
  } 
  clearToDosFromLocalStorage();
}
function clearToDosFromLocalStorage() {
  localStorage.clear();
}




// Filter

function filterToDos(e) {
  const text = e.target.value.toLowerCase();

  document.querySelectorAll('.collection-item').forEach(function(task){
    const item = task.firstChild.textContent;
    if(item.toLowerCase().indexOf(text) != -1){
      task.style.display = 'block';
    } else {
      task.style.display = 'none';
    }
  });
}