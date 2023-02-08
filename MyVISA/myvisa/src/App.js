import './App.css';

function App() {
  const name = 'maekkkkkkkkk';
  const person ={nom:'maek', age: 22} ;
  return (
    <div className="App">
      <div className="content">
        <h1>this is { name }</h1>
        <p>{ person.nom }</p>
      </div>
    </div>
  );
}

export default App;
