import React from 'react'
import {Switch, Route} from 'react-router-dom'
import Livro from './pages/livros/livros'
export default () => {
    return (
        <Switch>
            <Route exact path="/livros">
                <Livro/>
            </Route>
        </Switch>
    )
}