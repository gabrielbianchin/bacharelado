import React, {Component} from 'react';

import {
  StyleSheet,
  Text,
  View,
  TouchableOpacity,
  Image,
  ScrollView,
  Alert
} from 'react-native';

export default class Denuncias extends Component {

	constructor(props) {
    	super(props);

    //Alert.alert(this.state.urlFoto)

	}

  static navigationOptions = {
    title: 'Bem Vindo(a), Usuario',
    
    headerStyle: {
      backgroundColor: '#8aacb8',
   	},

    headerTintColor: '#fff',
  };

  

  render() {

      return (

        <View style={styles.container}>
        	<View style={{flexDirection:"row"}}>
	        	<TouchableOpacity style={styles.botao1}>
	        		<Text style={styles.statusBarText}>
	        			Filtro
	        		</Text>
	        	</TouchableOpacity>

	        	<TouchableOpacity style={styles.botao2} onPress={() => this.props.navigation.navigate('TelaNovaDenuncia')}>
	        		<Text style={styles.statusBarText}>
	        			Nova Denúncia
	        		</Text>
	        	</TouchableOpacity>
        	</View>

        	<ScrollView style={styles.scroll}>
        		
        		<View style={styles.caixadenuncia}>
        			<Text style={styles.textodenuncia}>
        				Denuncia 1
        			</Text>
              <View style={{flexDirection:"row"}}>
                <Text style={styles.textomeio}>
                  05/09/2018
                </Text>
                <TouchableOpacity style={styles.botaomais}>
                  <Text style={styles.textobotao}> + </Text>
                </TouchableOpacity>
              </View>
        			<Text style={styles.textodenuncia}>
        				Status: Finalizado
        			</Text>
        		</View>

        		<View style={styles.caixadenuncia}>
        			<Text style={styles.textodenuncia}>
        				Denuncia 2
        			</Text>
        			<View style={{flexDirection:"row"}}>
                <Text style={styles.textomeio}>
                  05/09/2018
                </Text>
                <TouchableOpacity style={styles.botaomais}>
                  <Text style={styles.textobotao}> + </Text>
                </TouchableOpacity>
              </View>
        			<Text style={styles.textodenuncia}>
        				Status: Finalizado
        			</Text>
        		</View>

        		<View style={styles.caixadenuncia}>
        			<Text style={styles.textodenuncia}>
        				Denuncia 3
        			</Text>
        			<View style={{flexDirection:"row"}}>
                <Text style={styles.textomeio}>
                  15/09/2018
                </Text>
                <TouchableOpacity style={styles.botaomais}>
                  <Text style={styles.textobotao}> + </Text>
                </TouchableOpacity>
              </View>
        			<Text style={styles.textodenuncia}>
        				Status: Em Andamento
        			</Text>
        		</View>

        		<View style={styles.caixadenuncia}>
        			<Text style={styles.textodenuncia}>
        				Denuncia 4
        			</Text>
        			<View style={{flexDirection:"row"}}>
                <Text style={styles.textomeio}>
                  25/09/2018
                </Text>
                <TouchableOpacity style={styles.botaomais}>
                  <Text style={styles.textobotao}> + </Text>
                </TouchableOpacity>
              </View>
        			<Text style={styles.textodenuncia}>
        				Status: Em Andamento
        			</Text>
        		</View>

        		<View style={styles.caixadenuncia}>
        			<Text style={styles.textodenuncia}>
        				Denuncia 5
        			</Text>
        			<View style={{flexDirection:"row"}}>
                <Text style={styles.textomeio}>
                  10/10/2018
                </Text>
                <TouchableOpacity style={styles.botaomais}>
                  <Text style={styles.textobotao}> + </Text>
                </TouchableOpacity>
              </View>
        			<Text style={styles.textodenuncia}>
        				Status: Pendente
        			</Text>
        		</View>

        		<View style={styles.caixadenuncia}>
        			<Text style={styles.textodenuncia}>
        				Denuncia 6
        			</Text>
        			<View style={{flexDirection:"row"}}>
                <Text style={styles.textomeio}>
                  24/10/2018
                </Text>
                <TouchableOpacity style={styles.botaomais}>
                  <Text style={styles.textobotao}> + </Text>
                </TouchableOpacity>
              </View>
        			<Text style={styles.textodenuncia}>
        				Status: Pendente
        			</Text>
        		</View>

        		<View style={styles.caixadenuncia}>
        			<Text style={styles.textodenuncia}>
        				Denuncia 7
        			</Text>
        			<View style={{flexDirection:"row"}}>
                <Text style={styles.textomeio}>
                  05/11/2018
                </Text>
                <TouchableOpacity style={styles.botaomais}>
                  <Text style={styles.textobotao}> + </Text>
                </TouchableOpacity>
              </View>
        			<Text style={styles.textodenuncia}>
        				Status: Pendente
        			</Text>
        		</View>

        		<View style={styles.caixadenuncia}>
        			<Text style={styles.textodenuncia}>
        				Denuncia 8
        			</Text>
        			<View style={{flexDirection:"row"}}>
                <Text style={styles.textomeio}>
                  15/11/2018
                </Text>
                <TouchableOpacity style={styles.botaomais}>
                  <Text style={styles.textobotao}> + </Text>
                </TouchableOpacity>
              </View>
        			<Text style={styles.textodenuncia}>
        				Status: Pendente
        			</Text>
        		</View>

        	</ScrollView>

        </View>
      );
    }
  
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#FFF',
  },

  botao1: {
  	alignSelf: 'stretch',
  	width: 140,	
    height: 60,
    marginLeft: 20,
    marginRight: 20,
    marginTop: 20,
    backgroundColor: '#8aacb8',
    borderRadius: 5,
    borderColor: '#000',
    justifyContent: 'flex-start',
  },

  botao2: {
  	alignSelf: 'stretch',	
    height: 60,
    width: 140,
    marginLeft: 20,
    marginRight: 20,
    marginTop: 20,
    backgroundColor: '#8aacb8',
    borderRadius: 5,
    borderColor: '#000',
    justifyContent: 'flex-start',
  },

  statusBarText: {
    color: '#FFF',
    fontSize: 20,
    paddingTop: 15,
    textAlign: 'center',
  },

  caixadenuncia: {
  	borderRadius: 5,
  	borderColor: '#000',
  	borderWidth: 1,
  	marginTop: 10,
  },

  scroll: {
 	alignSelf: 'stretch',	
    marginLeft: 20,
    marginRight: 20,
    marginTop: 20,
  },

  textodenuncia: {
  	fontSize: 16,
  	textAlign: 'center',
  },

  textomeio: {
    fontSize: 16,
    textAlign: 'center',
    marginLeft: 120,
    marginTop: 5,
  },

  botaomais: {
    backgroundColor: '#8aacb8',
    borderRadius: 5,
    borderColor: '#000',
    height: 30,
    width: 30,
    marginLeft: 60,
    paddingTop: 3,
    justifyContent: 'flex-start',
  },

  textobotao: {
    color: '#FFF',
    fontSize: 16,
    textAlign: 'center',
  },

});

