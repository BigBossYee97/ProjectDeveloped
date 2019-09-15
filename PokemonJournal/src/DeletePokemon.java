import java.awt.*;
import java.awt.event.*;
import static java.lang.System.out;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import javax.swing.*;
import java.sql.PreparedStatement;
public class DeletePokemon extends JFrame implements ActionListener{
    JLabel Header = new JLabel("Abandon Existing Pokemon");
    JLabel ID = new JLabel("Please enter the ID that you want to delete:");
    JLabel FirstName = new JLabel("First Name:");
    JLabel LastName = new JLabel("Last Name:");
    JLabel TeamType = new JLabel("Team Type:");
    JTextField IDText = new JTextField(3);
    JTextField FirstNameText = new JTextField(15);
    JTextField LastNameText = new JTextField(15);
    JComboBox Team = new JComboBox();
    JTextArea PokemonList = new JTextArea(5,60);
    JButton Delete = new JButton("Delete");
    JButton Show = new JButton("Show");
    JButton Reset = new JButton("Reset");
    JButton Exit = new JButton("Exit");
    JScrollPane scroll = new JScrollPane(PokemonList);
    DBHandler db = new DBHandler();
    
    
    DeletePokemon(){
        setLayout(new BorderLayout());
        setSize(700,700);
        setLocationRelativeTo(null);
        setTitle("Abandon Existing Pokemon");
        setResizable(false);
        JPanel North = new JPanel();
        North.setLayout(new FlowLayout(FlowLayout.CENTER));
        North.setBackground(Color.YELLOW);
        Header.setFont(new Font("Arial Black",Font.PLAIN,32));
        North.add(Header);
        JPanel Center = new JPanel();
        Center.setLayout(new GridLayout(5,1));
        JPanel Center1 = new JPanel();
        Center1.setLayout(new FlowLayout(FlowLayout.CENTER));
        PokemonList.setEditable(false);
        Center1.add(scroll);
        JPanel Center2 = new JPanel();
        Center2.setLayout(new FlowLayout(FlowLayout.CENTER));
        ID.setFont(new Font("Arial Black",Font.PLAIN,12));
        Center2.add(ID);
        Center2.add(IDText);
        JPanel Center3 = new JPanel();
        Center3.setLayout(new FlowLayout(FlowLayout.CENTER));
        FirstName.setFont(new Font("Arial Black",Font.PLAIN,12));
        FirstName.setPreferredSize(new Dimension(100,40));
        Center3.add(FirstName);
        Center3.add(FirstNameText);
        JPanel Center4 = new JPanel();
        Center4.setLayout(new FlowLayout(FlowLayout.CENTER));
        LastName.setFont(new Font("Arial Black",Font.PLAIN,12));
        LastName.setPreferredSize(new Dimension(100,40));
        Center4.add(LastName);
        Center4.add(LastNameText);
        JPanel Center5 = new JPanel();
        Center5.setLayout(new FlowLayout(FlowLayout.CENTER));
        TeamType.setFont(new Font("Arial Black",Font.PLAIN,12));
        Team.setFont(new Font("Arial Black",Font.PLAIN,12));
        TeamType.setPreferredSize(new Dimension(100,40));
        Team.addItem("None");
        Team.addItem("Valor");
        Team.addItem("Mystic");
        Team.addItem("Instinct");
        Center5.add(TeamType);
        Center5.add(Team);
        
        
        Center.add(Center1);
        Center.add(Center2);
        Center.add(Center3);
        Center.add(Center4);
        Center.add(Center5);
        
        JPanel South = new JPanel();
        South.setLayout(new GridLayout(2,1));
        JPanel South1 = new JPanel();
        South1.setLayout(new FlowLayout(FlowLayout.CENTER));
        Delete.setFont(new Font("Arial Black",Font.PLAIN,12));
        Delete.setPreferredSize(new Dimension(100,40));
        Show.setFont(new Font("Arial Black",Font.PLAIN,12));
        Show.setPreferredSize(new Dimension(100,40));
        South1.add(Show);
        South1.add(Delete);
        JPanel South2 = new JPanel();
        South2.setLayout(new FlowLayout(FlowLayout.CENTER));
        Reset.setFont(new Font("Arial Black",Font.PLAIN,12));
        Exit.setFont(new Font("Arial Black",Font.PLAIN,12));
        Reset.setPreferredSize(new Dimension(100,40));
        Exit.setPreferredSize(new Dimension(100,40));
        South2.add(Reset);
        South2.add(Exit);
        South.add(South1);
        South.add(South2);
        add("North",North);
        add("Center",Center);
        add("South",South);
        setVisible(true);
        
        Show.addActionListener(this);
        Delete.addActionListener(this);
        Reset.addActionListener(this);
        Exit.addActionListener(this);
        IDText.addActionListener(this);
        FirstNameText.addActionListener(this);
        LastNameText.addActionListener(this);
        Team.addActionListener(this);
    }
    public void actionPerformed(ActionEvent e){
        
        if(e.getSource() == Delete){
            db.DeletePokemon();
        }
        
        if(e.getSource() == Show){
            db.getPokemon();
        }
        
        if(e.getSource() == Exit){
            System.exit(0);
        }
        
        if(e.getSource() == Reset){
            Team.setSelectedIndex(0);
            FirstNameText.setText("");
            LastNameText.setText("");
            IDText.setText("");
            PokemonList.setText("");
        }
        
    }
    
class DBHandler {
    private Statement myStatement;

public DBHandler() {
        try { 
                
            Class.forName("net.ucanaccess.jdbc.UcanaccessDriver");
            String url = 
               "jdbc:ucanaccess://PokemonHunter.accdb";
        
            Connection PokemonHunter = DriverManager.getConnection(url, "admin", ""); 
            
            
             myStatement = PokemonHunter.createStatement();
             
            
        }
        
        catch (ClassNotFoundException cnfe) {
            out.println(cnfe);
        }
        catch (SQLException sqle) {
            out.println(sqle);
        }
    }

   
    public void getPokemon() {
       String firstname = FirstNameText.getText();
       String lastname = LastNameText.getText();
   
       if(firstname.equals("") && lastname.equals("")){
            JOptionPane.showMessageDialog(null,"Please enter the first name and last name to get the Pokemon List","Alert",JOptionPane.INFORMATION_MESSAGE);
        }
       PokemonList.setText("");
       boolean CheckUser = false;
        try {
           
            PokemonList.append("      ID\tPokemon\tType\tCP\tDate Caught\tWeight\tHeight" + "\n");
            PokemonList.append("________________________________________________________________________________________________\n");
            
            ResultSet results = myStatement.executeQuery
                ("SELECT * FROM HunterRecord");
            while (results.next()) {
               String array[] = {results.getString("ID"),results.getString("FirstName"),results.getString("LastName"),results.getString("TeamType"),results.getString("PokemonName"),results.getString("PokemonType"),results.getString("CPTotal"),results.getString("DateCaught"),results.getString("Weight"),results.getString("Height")};
               
                if(firstname.equals(array[1]) && lastname.equals(array[2]) && Team.getSelectedItem().equals(array[3])){
                    PokemonList.append("      " + array[0] + "\t");
                    PokemonList.append(array[4] + "\t");
                    PokemonList.append(array[5] + "\t");
                    PokemonList.append(array[6] + "\t");
                    PokemonList.append(array[7] + "\t");
                    PokemonList.append(array[8] + " kg\t");
                    PokemonList.append(array[9] + " cm\n");
                    CheckUser = true;
                }
     
                     
            }
            if(CheckUser == false && !firstname.equals("") && !lastname.equals("")){
                JOptionPane.showMessageDialog(null,"Invalid User");
            }
            
            results.close();
        }
        catch (SQLException sqle) {
            out.println(sqle);
        }
}
    
    public void DeletePokemon(){
      String idstr = IDText.getText();
      int id = Integer.parseInt(idstr);
      int array[] = {id};
      if(idstr.equals("")){
          JOptionPane.showMessageDialog(null,"Please enter the ID number that you want to delete.","Alert",JOptionPane.INFORMATION_MESSAGE);
      }
      
      try{
           String url = 
               "jdbc:ucanaccess://PokemonHunter.accdb";
        
            Connection PokemonHunter = DriverManager.getConnection(url, "admin", ""); 
            String DeletePokemon = 
                    "DELETE FROM HunterRecord WHERE ID =?";
            PreparedStatement pst = PokemonHunter.prepareStatement(DeletePokemon);
            pst.setInt(1,array[0] );
            int confirmation = JOptionPane.showConfirmDialog(null,"Are you sure to delete this pokemon?","Warning",JOptionPane.YES_NO_OPTION);
            if(confirmation == JOptionPane.YES_OPTION){
            
                pst.executeUpdate();
                JOptionPane.showMessageDialog(null,"Pokemon Deleted","Alert",JOptionPane.INFORMATION_MESSAGE);
            }
            
      }
      catch(SQLException sqle){
          JOptionPane.showMessageDialog(null,"Delete Unsucessfully");
      }
       
    }
}
}

