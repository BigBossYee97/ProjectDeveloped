import java.awt.*;
import java.awt.event.*;
import javax.swing.*;

public class Option extends JFrame implements ActionListener {
    JLabel Ask = new JLabel("Welcome! What do you want to do?");
    JButton DisplayInformation = new JButton("Pokemon Hunter Info");
    JButton CatchPokemon = new JButton("Store New Pokemon");
    JButton Pokestop = new JButton("Store New Pokestop");
    JButton Raid = new JButton("Store New Raid");
    JButton AddUser = new JButton("Add New User");
    JButton DeleteUser = new JButton("Delete Existing User");
    JButton DeletePokemon = new JButton("Delete Existing Pokemon");
    JButton DeletePokestop = new JButton("Delete Existing Pokestop");
    JButton DeleteRaid = new JButton("Delete Existing Raid");
    JButton AddHunter = new JButton("Add/Delete Hunter");
    JButton LogOut = new JButton("Log Out");
    
    Option(){
        setLayout(new BorderLayout());
        setSize(800,400);
        setTitle("Option");
        setLocationRelativeTo(null);
        setResizable(false);
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        JPanel Center = new JPanel();
        Center.setLayout(new GridLayout(4,1));
        JPanel Center1 = new JPanel();
        Center1.setLayout(new FlowLayout(FlowLayout.CENTER));
        Center1.setBackground(Color.yellow);
        Ask.setFont(new Font("Arial Black",Font.PLAIN,32));
        Center1.add(Ask);
        JPanel Center2 = new JPanel();
        Center2.setLayout(new FlowLayout(FlowLayout.CENTER));
        Center2.setBackground(Color.YELLOW);
        DisplayInformation.setFont(new Font("Arial Black",Font.PLAIN,14));
        CatchPokemon.setFont(new Font("Arial Black",Font.PLAIN,14));
        Pokestop.setFont(new Font("Arial Black",Font.PLAIN,14));
        Raid.setFont(new Font("Arial Black",Font.PLAIN,14));
        Center2.add(DisplayInformation);
        Center2.add(CatchPokemon);
        Center2.add(Pokestop);
        Center2.add(Raid);
        JPanel Center3 = new JPanel();
        Center3.setLayout(new FlowLayout(FlowLayout.CENTER));
        Center3.setBackground(Color.yellow);
        AddUser.setFont(new Font("Arial Black",Font.PLAIN,14));
        DeleteUser.setFont(new Font("Arial Black",Font.PLAIN,14));
        LogOut.setFont(new Font("Arial Black",Font.PLAIN,14));
        DeletePokemon.setFont(new Font("Arial Black",Font.PLAIN,14));
        DeletePokestop.setFont(new Font("Arial Black",Font.PLAIN,14));
        DeleteRaid.setFont(new Font("Arial Black",Font.PLAIN,14)); 
        AddHunter.setFont(new Font("Arial Black",Font.PLAIN,14));
        Center3.add(DeletePokemon);
        Center3.add(DeletePokestop);
        Center3.add(DeleteRaid);
        JPanel Center4 = new JPanel();
        Center4.setLayout(new FlowLayout(FlowLayout.CENTER));
        Center4.setBackground(Color.YELLOW);
        Center4.add(AddHunter);
        Center4.add(AddUser);
        Center4.add(DeleteUser);
        Center4.add(LogOut);
        
        Center.add(Center1);
        Center.add(Center2);
        Center.add(Center3);
        Center.add(Center4);
        
        add("Center",Center);
        setVisible(true);
        
        DisplayInformation.addActionListener(this);
        CatchPokemon.addActionListener(this);
        Pokestop.addActionListener(this);
        Raid.addActionListener(this);
        DeleteUser.addActionListener(this);
        DeletePokemon.addActionListener(this);
        DeleteRaid.addActionListener(this);
        DeletePokestop.addActionListener(this);
        AddHunter.addActionListener(this);
        AddUser.addActionListener(this);
        LogOut.addActionListener(this);
    }
    
public void actionPerformed(ActionEvent e){
    
    if(e.getSource() == AddHunter){
        new AddHunterandLevel();
    }
    if(e.getSource() == DeletePokemon){
        new DeletePokemon();
    }
    
    if(e.getSource() == DeletePokestop){
        new DeletePokestop();
    }
    
    if(e.getSource() == DeleteRaid){
        new DeleteRaid();
    }
    
    if(e.getSource() == DisplayInformation){
       new PokemonHunterInfo();
    }
    
    if(e.getSource() == CatchPokemon){
        new PokemonCatch();
    }
    
    if(e.getSource() == Pokestop){
        new PokestopVisited();
    }
    
    if(e.getSource() == Raid){
        new Raid();
    }
    
    if(e.getSource() == LogOut){
        JOptionPane.showMessageDialog(null,"Log Out Successfully");
        new Login();
        dispose();
    }
    if(e.getSource() == AddUser){
        new Register();
    }
    
    if(e.getSource() == DeleteUser){
        new DeleteUser();
    }
}
}
