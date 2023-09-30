import { MongoClient } from 'mongodb';
 
const uri = 'mongodb+srv://erYbus:LVYByFO608lyfR2d@cluster0.kgmrjxt.mongodb.net/meetups?retryWrites=true&w=majority';

// /api/new-meetup
// POST /api/new-meetup

async function handler(req, res) {
  if (req.method === 'POST') {
    const data = req.body;

    const client = await MongoClient.connect(
      uri
    );
    const db = client.db();

    const meetupsCollection = db.collection('meetups');

    const result = await meetupsCollection.insertOne(data);

    console.log(result);

    client.close();

    res.status(201).json({ message: 'Meetup inserted!' });
  }
}

export default handler;