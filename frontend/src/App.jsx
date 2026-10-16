import { useEffect, useState } from 'react';
import './App.css';

function App() {
  const [extracteddata, setData] = useState([]);
  const [title,setTitle] = useState("")
  const [author, setAuthor] = useState("")


  useEffect(()=>{
    extractData();
  },[setData])

  const deleteData = async(id)=>{
    const data = await fetch(`http://localhost:8000/api/books/${id}`,{
      method:"DELETE"
    })

    extractData();
  }
  const extractData = async () => {
    try {
      const data = await fetch('http://localhost:8000/api/books');
      const result = await data.json();
      console.log(result.data);
      setData(result.data);
    } catch (error) {
      console.error("Error fetching data:", error);
    }
  };

  const sendData = async()=>{
    try{
      const bookData={
        title:title,
        author:author
      }

      const data = await fetch("http://localhost:8000/api/books",{
        method:"POST",
        headers:{
          "Content-Type":'application/json'
        },
        body: JSON.stringify(bookData)
      
      } )
    const result = await data.json();

    extractData();
    }catch(error){
      console.error("Error sending data", error)
    }
  }
  return (
    <div style={{ padding: '20px', fontFamily: 'sans-serif' }}>
    <input type="text" onChange={(e)=>{setTitle(e.target.value)}}/>
    <input type="text" onChange={(e)=>{setAuthor(e.target.value )}}/>
    <button onClick={()=>{sendData()}}> Submit</button>
      {extracteddata.length > 0 && (
        <table className="books-table">
          <thead>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Author</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            {extracteddata.map((element, index) => (
              <tr key={element.id || index}>
                <td>{index + 1}</td>
                <td>{element.title}</td>
                <td>{element.author}</td>
                <td><button onClick={()=>{deleteData(element.id)}}>Delete</button></td>
              </tr>
            ))}
          </tbody>
        </table>
      )}
    </div>
  );
}

export default App;
