import React, {Component} from 'react';
import {Platform, StyleSheet, Text, View, TouchableOpacity, Alert, TextInput} from 'react-native';

import { createStackNavigator } from 'react-navigation';

import NovaDenuncia from './components/NovaDenuncia';
import Denuncias from './components/Denuncias';
import Cadastro from './components/Cadastro';

class HomeScreen extends Component {

  constructor(props){
    super(props)
    this.state = {
      email: '',
      senha: '',
    }
  }

  static navigationOptions = {
    title: 'DeTer',
    
    headerStyle: {
      backgroundColor: '#8aacb8',
      textAlign: 'center',
    },

    headerTintColor: '#fff',
  };

  quandoclica = () => {
    if(this.state.senha == 'senha123' && this.state.email == 'joao@joao.com'){
      this.props.navigation.navigate('TelaDenuncias')
    }
    else{
      Alert.alert('Usuário não cadastrado')
    }
  }
  
  render() {
    return (
      <View style={styles.container}>

        <Text style={styles.textologin}>
          Login
        </Text>
        <TextInput 
          autoCapitalize="none"
          style={styles.boxInputEmail}
          underlineColorAndroid="rgba(0, 0, 0, 0)"
          placeholder="Email"
          keyboardType="email-address"
          onChangeText={(email) => this.setState({email})}
        />

        <Text style={styles.textologin2}>
          Senha
        </Text>
        <TextInput 
          autoCapitalize="none"
          style={styles.boxInputSenha}
          underlineColorAndroid="rgba(0, 0, 0, 0)"
          placeholder="Senha"
          secureTextEntry={true}
          onChangeText={(senha) => this.setState({senha})}
        />

        <TouchableOpacity style={styles.botao1} onPress={this.quandoclica}>
          <Text style={styles.statusBarText}>
            Entrar
          </Text>
        </TouchableOpacity>

        <TouchableOpacity style={styles.botao2} onPress={() => this.props.navigation.navigate('TelaCadastro')}>
          <Text style={styles.statusBarText}>
            Criar Conta
          </Text>
        </TouchableOpacity>

        <TouchableOpacity style={styles.botaoesqueceusenha}>
          <Text style={styles.esquecisenha}>
            Esqueci minha senha
          </Text>
        </TouchableOpacity>

      </View>
    );
  }
}

const RootStack = createStackNavigator(
  {
    /*Todas as telas*/
    Home: HomeScreen,
    TelaNovaDenuncia: NovaDenuncia,
    TelaDenuncias: Denuncias,
    TelaCadastro: Cadastro,
  },

  {
    /*Tela inicial*/
    initialRouteName: 'Home',
  }
);

export default class App extends Component<Props> {

  render() {
    return(
      <RootStack />
    );
  }
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#FFF',
  },

  textologin: {
    textAlign: 'center',
    fontSize: 30,
    paddingTop: 30,
  },

  boxInputEmail: {
    alignSelf: 'stretch',
    textAlign: 'center',
    marginTop: 10,
    marginBottom: 10,
    marginLeft: 20,
    marginRight: 20,
    paddingVertical: 0,
    paddingHorizontal: 20,
    height: 60,
    borderRadius: 5,
    borderWidth: 1,
    borderColor: '#000',
    fontSize: 18,
  },

  textologin2: {
    textAlign: 'center',
    fontSize: 30,
    paddingTop: 30,
  },

  boxInputSenha: {
    alignSelf: 'stretch',
    textAlign: 'center',
    marginTop: 10,
    marginBottom: 30,
    marginLeft: 20,
    marginRight: 20,
    paddingVertical: 0,
    paddingHorizontal: 20,
    height: 60,
    borderRadius: 5,
    borderWidth: 1,
    borderColor: '#000',
    fontSize: 18,
  },

  botao1: {
    alignSelf: 'stretch',
    marginTop: 10,
    marginBottom: 30,
    marginLeft: 20,
    marginRight: 20,
    paddingVertical: 0,
    paddingHorizontal: 20,
    height: 60,
    backgroundColor: '#8aacb8',
    borderRadius: 5,
    borderColor: '#000',
  },

  botao2: {
    alignSelf: 'stretch',
    marginTop: 10,
    marginBottom: 10,
    marginLeft: 20,
    marginRight: 20,
    paddingVertical: 0,
    paddingHorizontal: 20,
    height: 60,
    backgroundColor: '#8aacb8',
    borderRadius: 5,
    borderColor: '#000',
  },

  statusBarText: {
    color: '#FFF',
    fontSize: 20,
    paddingTop: 15,
    textAlign: 'center',
  },

  botaoesqueceusenha: {
     alignSelf: 'stretch',
    marginTop: 0,
    marginBottom: 30,
    marginLeft: 20,
    marginRight: 20,
    paddingVertical: 0,
    paddingHorizontal: 20,
    height: 20,
    backgroundColor: '#fff',
  },

  esquecisenha: {
    color: '#8aacb8',
    fontSize: 14,
    paddingTop: 5,
    textAlign: 'center',
  }

});
