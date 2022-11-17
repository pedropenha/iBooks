import React from 'react'
import {Switch, Route} from 'react-router-dom'
import Livro from './pages/livros/livros'
import Patrimonio from './pages/patrimonio/Patrimonio'
import Login from './pages/login/Login'
import Paramet from './pages/parametro/Paramet'

export default () => {
    return (
        <Switch>
            <Route exact path="/livros">
                <Livro/>
            </Route>
            <Route exact path="/patrimonio">
                <Patrimonio/>
            </Route>
            <Route exact path="/login">
                <Login/>
            </Route>
            <Route exact path="/parametriza">
                <Paramet/>
            </Route>

        </Switch>
    )
}