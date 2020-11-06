@extends('layout.app')

@section('content')
<section class="todoapp">
    <header class="header">
      <input class="new-todo"
          autocomplete="off"
          placeholder="Type your todo list"
          v-model="newTodo"
          @keyup.enter="addTodo">
        <button class="new-todo-button"
          @click="addTodo"  
          v-show="newTodo.length > 0"
        ></button>
    </header>
    <section class="main" v-show="todos.length" v-cloak>
      <div class="completed-wrapper">
        <input id="toggle-all" class="toggle-all" type="checkbox" v-model="allDone">
        <label for="toggle-all">Complete all tasks</label>
        <button class="clear-completed" @click="removeCompleted">
          Clear completed
        </button>
      </div>
      <ul class="todo-list">
        <li v-for="todo in filteredTodos"
          class="todo"
          :key="todo.id"
          :class="{ completed: todo.completed, editing: todo == editedTodo }">
          <div class="view">
            <input class="toggle" type="checkbox" v-model="todo.completed">
            <label @dblclick="editTodo(todo)">@{{ todo.title }}</label>
            <button class="destroy" @click="removeTodo(todo)"></button>
          </div>
          <input class="edit" type="text"
            v-model="todo.title"
            v-todo-focus="todo == editedTodo"
            @blur="doneEdit(todo)"
            @keyup.enter="doneEdit(todo)"
            @keyup.esc="cancelEdit(todo)">
        </li>
      </ul>
    </section>
    <footer class="footer" v-show="todos.length" v-cloak>
      <span class="todo-count">
        <strong>@{{ remaining }}</strong> @{{ remaining | pluralize }} left
      </span>
      <ul class="filters">
        <li><a href="#/all" :class="{ selected: visibility == 'all' }">All</a></li>
        <li><a href="#/active" :class="{ selected: visibility == 'active' }">Uncomplete</a></li>
        <li><a href="#/completed" :class="{ selected: visibility == 'completed' }">Completed</a></li>
      </ul>
    </footer>
</section>
@endsection
