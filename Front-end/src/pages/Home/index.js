import Indexnavbar from '../../components/Navbar/Indexnavbar';

function App() {
  return (
    <div className="App">
      <Indexnavbar/>
    <main className='bg-gray-100 py-16 px-6'>
      <div className='flex mt-8'>
        <div className='bg-white mx-4 rounded overflow-hidden shadow-md'>
          <img src='images/canv1.png'/>
          <div className='p-4'>
            <div><span className='font-bold text-lg '>Description</span></div>
            <div><span className='font-bold text-lg '>Titre</span></div>
          </div>
        </div>
        <div className='bg-white mx-4 rounded overflow-hidden shadow-md'>
          <img src="images/canv2.png"/>
          <div className='p-4'>
            <div><span className='font-bold text-lg '>Description</span></div>
            <div><span className='font-bold text-lg '>Titre</span></div>
          </div>
        </div>
        <div className='bg-white mx-4 rounded overflow- shadow-md '>
          <img src="images/canv3.png"/>
          <div className='p-4'>
            <div><span className='font-bold text-lg '>Description</span></div>
            <div><span className='font-bold text-lg '>Titre</span></div>
          </div>
        </div>
      </div>
    </main>
    </div>
  );
}

export default App;
