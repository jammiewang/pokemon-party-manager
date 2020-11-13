import React, { useState } from 'react';
import { getBasePokemon, getItem } from '../axios/api';
import { BasePokemon, Item, Pokemon, Move, Party, User } from '../types/types';
import TextField from '@material-ui/core/TextField';
import PokemonCard from '../components/pokemonCard/PokemonCard';
import { getParty, getUser, getMove, getUserID, deleteParty, deletePokemon } from '../axios/api';

function TestJammie() {
    // Declare a new state variable, which we'll call "count"
    //const [count, setCount] = useState(0);

    let bulbasaur: BasePokemon = {
        pokedex_number: 1,
        name: 'Bulbasaur',
        type1: 'Grass',
        type2: 'Poison',
        hp: 45,
        attack: 49,
        defense: 49,
        special_attack: 65,
        special_defense: 65,
        speed: 45,
        sprite_data: 'https://img.pokemondb.net/artwork/bulbasaur.jpg',
    };
    let move1: Move = {
        move_name: 'jump',
        power: 40,
        accuracy: 100,
        type: 'poison',
        pp: 3,
        effect: 'jumps',
    };
    let poki1: Pokemon = {
        pkID: 4,
        nickname: 'Charlie',
        level: 5,
        moves: [move1],
        baseInfo: bulbasaur,
    };
    let party1: Party = {
        party_id: 12,
        member: [poki1],
    };
    let user1: User = {
        user_id: 3,
        username: 'Charles',
    };
    
    const [count, setCount] = useState(1);
    const [base, setBase] = useState<Party>(party1);
    const [partyDel, setPartyDel] = useState<Party>(party1);
    const [user, setUser] = useState<User>(user1);
    const [userName, setUserName] = useState<User>(user1);
    const [move, setMove] = useState<Move>(move1);
    const [pokeDel, setPokeDel] = useState<Pokemon>(poki1);

    React.useEffect(() => {
        getParty(count).then((res) => {
            setBase(res.data);
        });
    }, [count]);

    React.useEffect(() => {
        deleteParty(count).then((res) => {
            setPartyDel(res.data);
        });
    }, [count]);

    React.useEffect(() => {
        deletePokemon(11).then((res) => {
            setPokeDel(res.data);
        });
    }, [count]);

    React.useEffect(() => {
        getUser(count).then((res) => {
            setUser(res.data);
        });
    }, [count]);

    React.useEffect(() => {
        getUserID('yiff.li').then((res) => {
            setUserName(res.data);
        });
    }, [count]);

    React.useEffect(() => {
        getMove('after-you').then((res) => {
            setMove(res.data);
            console.log(res.data);
        });
    }, [count]);

    const handleInputChange = (e) => {
        setCount(e.target.value);
    };

    return (
        <div>
            Jammie's Testing Room
            <p>You clicked {count} times</p>
            <button onClick={() => setCount(count + 1)}>Click me</button>
            <TextField name="name" label="Party Number" onChange={handleInputChange} value={count} />
            <p>{JSON.stringify(user)}</p>
        </div>
    );
}
export default TestJammie;
